<?php

namespace Smart\Sage50\SalesOrder;

use Doctrine\ORM\EntityManagerInterface;
use Smart\Sage50\NextPrimaryKey\NextPrimaryKeyRepository;
use Smart\Sage50\JournalEntry\JournalEntryRepository;
use Smart\Sage50\SalesOrder\Item\ItemEntity;
use Smart\Sage50\SalesOrder\ItemTax\ItemTaxEntity;
use Smart\Sage50\Tax\TaxEntity;
use Smart\Sage50\Tax\TaxCollection;
use Smart\Sage50\LocationInventory\LocationInventoryRepository;

class SalesOrderBuilder
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var SalesOrderEntity
     */
    private $salesOrder;

    /**
     * @var array
     */
    private $items = [];

    /**
     * @var TaxCollection[]
     */
    private $taxCollections = [];

    /**
     * @var NextPrimaryKeyRepository
     */
    private $nextPrimaryKeyRepository;

    /**
     * @var JournalEntryRepository
     */
    private $journalEntryRepository;

    /**
     * @var LocationInventoryRepository
     */
    private $locationInventoryRepository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->nextPrimaryKeyRepository = $this->entityManager->getRepository(
            'Smart\\Sage50\\NextPrimaryKey\\NextPrimaryKeyEntity'
        );
        $this->journalEntryRepository = $this->entityManager->getRepository(
            'Smart\\Sage50\\JournalEntry\\JournalEntryEntity'
        );
        $this->locationInventoryRepository = $this->entityManager->getRepository(
            'Smart\\Sage50\\LocationInventory\\LocationInventoryEntity'
        );
    }

    /**
     * @param SalesOrderEntity $salesOrder
     * @param TaxCollection[] $taxCollections
     */
    public function createSalesOrder(SalesOrderEntity $salesOrder, array $taxCollections = null)
    {
        if (null !== $taxCollections) {
            $this->taxCollections = $taxCollections;
        }
        $this->addSalesOrder($salesOrder);
    }

    /**
     * @param SalesOrderEntity $salesOrder
     */
    protected function addSalesOrder(SalesOrderEntity $salesOrder)
    {
        $this->salesOrder = $salesOrder;
        $this->salesOrder->setId($this->nextPrimaryKeyRepository->fetchNextSalesOrderId());
        $this->salesOrder->setNextId($this->journalEntryRepository->fetchNextJournalEntryId());
    }

    protected function persistSalesOrder()
    {
        $this->entityManager->persist($this->salesOrder);
        $this->entityManager->flush($this->salesOrder);

        foreach ($this->items as $itemArray) {
            /** @var ItemEntity $item */
            $item = $itemArray['item'];
            /** @var ItemTaxEntity[] $itemTaxes */
            $itemTaxes = $itemArray['itemTaxes'];

            $item->setSalesOrderId($this->salesOrder->getId());
            $this->entityManager->persist($item);
            foreach ($itemTaxes as $itemTax) {
                $itemTax->setSalesOrderId($this->salesOrder->getId());
                $this->entityManager->persist($itemTax);
            }
            $this->increaseInventoryOnSalesOrder($item);
        }

        $this->nextPrimaryKeyRepository->increaseNextSalesOrderId();
        $this->entityManager->flush();
    }

    /**
     * @param ItemEntity $item
     */
    protected function increaseInventoryOnSalesOrder(ItemEntity $item)
    {
        $this->locationInventoryRepository->increaseInventoryOnSalesOrder(
            $item->getInventoryId(),
            $item->getInventoryLocationId(),
            $item->getQuantityOrdered()
        );
    }

    /**
     * @param ItemEntity $item
     * @param TaxCollection[] $taxCollections
     */
    public function addItem(ItemEntity $item, array $taxCollections = null)
    {
        $this->items[spl_object_hash($item)] = [
            'item' => $item,
            'itemTaxes' => [],
        ];

        $item->setSalesOrderItemId(count($this->items));

        if (null === $taxCollections && null !== $this->taxCollections) {
            $taxCollections = $this->taxCollections;
        }

        if (null !== $taxCollections) {
            foreach ($taxCollections as $taxCollection) {
                $this->addItemTax($taxCollection, $item, new ItemTaxEntity);
            }
        }
    }

    /**
     * @param TaxCollection $taxCollection
     * @param ItemEntity $item
     * @param ItemTaxEntity $itemTax
     */
    public function addItemTax(TaxCollection $taxCollection, ItemEntity $item, ItemTaxEntity $itemTax)
    {
        $taxId = null;
        $totalTaxAmount = 0;
        /** @var TaxEntity $taxEntity */
        foreach ($taxCollection as $taxEntity) {
            $taxId = $taxEntity->getTaxCode()->getTaxId();
            if ($taxEntity->isCompound()) {
                $taxAmount = bcmul($item->getAmount() + $totalTaxAmount, $taxEntity->getRate(), 2);
            } else {
                $taxAmount = bcmul($item->getAmount(), $taxEntity->getRate(), 2);
            }
            $totalTaxAmount = bcadd($totalTaxAmount, $taxAmount, 2);
        }
        if (null !== $taxId) {
            $itemTax->setTaxId($taxId);
            $itemTax->setSalesOrderItemId($item->getSalesOrderItemId());
            $itemTax->setTaxAmount($totalTaxAmount);
            $this->items[spl_object_hash($item)]['itemTaxes'][spl_object_hash($itemTax)] = $itemTax;
        }
    }
}
