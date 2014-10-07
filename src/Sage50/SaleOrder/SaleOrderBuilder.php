<?php
namespace Sinergi\Sage50\SaleOrder;

use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\NextPrimaryKey\NextPrimaryKeyRepository;
use Sinergi\Sage50\JournalEntry\JournalEntryRepository;

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
     * @var NextPrimaryKeyRepository
     */
    private $nextPrimaryKeyRepository;

    /**
     * @var JournalEntryRepository
     */
    private $journalEntryRepository;

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
    }

    public function createSaleOrder(SaleOrderEntity $saleOrder)
    {
        $this->addSaleOrder($saleOrder);
        // after persist
        $this->nextPrimaryKeyRepository->increaseNextSaleOrderId();
    }

    protected function addSaleOrder(SaleOrderEntity $saleOrder)
    {
        $this->saleOrder = $saleOrder;
        $this->saleOrder->setId($this->nextPrimaryKeyRepository->fetchNextSaleOrderId());
        $this->saleOrder->setNextId($this->journalEntryRepository->fetchNextJournalEntryId());
    }
}
