<?php

namespace Smart\Sage50\SaleOrder;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Smart\Sage50\MapperEventsInterface;
use Smart\Sage50\MapperInterface;
use Smart\Sage50\SyncerInterface;

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
        /** @var SaleOrderRepository $repository */
        $repository = $this->entityManager->getRepository('Smart\\Sage50\\SaleOrder\\SaleOrderEntity');
        $items = $repository->findModifiedAfter($dateTime);
        foreach ($items as $item) {
            $this->getMapper()->mapFromSage($item);
        }
        if ($this->mapper instanceof MapperEventsInterface) {
            $this->mapper->onFinish();
        }
    }
}
