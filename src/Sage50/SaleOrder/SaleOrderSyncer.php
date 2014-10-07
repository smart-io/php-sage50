<?php
namespace Sinergi\Sage50\SaleOrder;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\MapperInterface;
use Sinergi\Sage50\SyncerInterface;

class SaleOrderSyncer implements SyncerInterface
{
    /**
     * @var MapperInterface
     */
    protected $mapper;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param MapperInterface $mapper
     */
    public function setMapper(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return MapperInterface $mapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param DateTime $dateTime
     * @return mixed
     */
    public function syncSince(DateTime $dateTime)
    {
        if (null === $this->mapper) {
            throw new \InvalidArgumentException;
        }
        /** @var SaleOrderRepository $saleOrderRepository */
        $saleOrderRepository = $this->entityManager->getRepository('Sinergi\\Sage50\\SaleOrder\\SaleOrderEntity');
        $saleOrders = $saleOrderRepository->findModifiedAfter($dateTime);
        foreach ($saleOrders as $saleOrder) {
            $this->getMapper()->mapFromSage($saleOrder);
        }
    }
}
