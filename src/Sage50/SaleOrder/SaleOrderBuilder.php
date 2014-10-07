<?php
namespace Sinergi\Sage50\SaleOrder;

use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\NextPrimaryKey\NextPrimaryKeyRepository;
use Sinergi\Sage50\JournalEntry\JournalEntryRepository;
use Sinergi\Sage50\SaleOrder\Item\ItemEntity;
use Sinergi\Sage50\SaleOrder\ItemTax\ItemTaxEntity;
use Sinergi\Sage50\Tax\TaxEntity;
use Sinergi\Sage50\Tax\TaxCollection;
use Sinergi\Sage50\LocationInventory\LocationInventoryRepository;

class SaleOrderBuilder
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var SaleOrderEntity
     */
    private $saleOrder;

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
            'Sinergi\\Sage50\\NextPrimaryKey\\NextPrimaryKeyEntity'
        );
        $this->journalEntryRepository = $this->entityManager->getRepository(
            'Sinergi\\Sage50\\JournalEntry\\JournalEntryEntity'
        );
        $this->locationInventoryRepository = $this->entityManager->getRepository(
            'Sinergi\\Sage50\\LocationInventory\\LocationInventoryEntity'
        );
    }

    /**
     * @param SaleOrderEntity $saleOrder
     * @param TaxCollection[] $taxCollections
     */
    public function createSaleOrder(SaleOrderEntity $saleOrder, array $taxCollections = null)
    {
        if (null !== $taxCollections) {
            $this->taxCollections = $taxCollections;
        }
        $this->addSaleOrder($saleOrder);
    }

    /**
     * @param SaleOrderEntity $saleOrder
     */
    protected function addSaleOrder(SaleOrderEntity $saleOrder)
    {
        $this->saleOrder = $saleOrder;
        $this->saleOrder->setId($this->nextPrimaryKeyRepository->fetchNextSaleOrderId());
        $this->saleOrder->setNextId($this->journalEntryRepository->fetchNextJournalEntryId());
    }

    protected function persistSaleOrder()
    {
        $this->entityManager->persist($this->saleOrder);
        $this->entityManager->flush($this->saleOrder);

        foreach ($this->items as $itemArray) {
            /** @var ItemEntity $item */
            $item = $itemArray['item'];
            /** @var ItemTaxEntity[] $itemTaxes */
            $itemTaxes = $itemArray['itemTaxes'];

            $item->setSaleOrderId($this->saleOrder->getId());
            $this->entityManager->persist($item);
            foreach ($itemTaxes as $itemTax) {
                $itemTax->setSaleOrderId($this->saleOrder->getId());
                $this->entityManager->persist($itemTax);
            }
            $this->increaseInventoryOnSaleOrder($item);
        }

        $this->nextPrimaryKeyRepository->increaseNextSaleOrderId();
        $this->entityManager->flush();
    }

    /**
     * @param ItemEntity $item
     */
    protected function increaseInventoryOnSaleOrder(ItemEntity $item)
    {
        $this->locationInventoryRepository->increaseInventoryOnSaleOrder(
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

        $item->setSaleOrderItemId(count($this->items));

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
            $itemTax->setSaleOrderItemId($item->getSaleOrderItemId());
            $itemTax->setTaxAmount($totalTaxAmount);
            $this->items[spl_object_hash($item)]['itemTaxes'][spl_object_hash($itemTax)] = $itemTax;
        }
    }
}
