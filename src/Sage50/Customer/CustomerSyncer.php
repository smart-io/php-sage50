<?php
namespace Sinergi\Sage50\Customer;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Sage50\MapperInterface;
use Sinergi\Sage50\SyncerInterface;

class CustomerSyncer implements SyncerInterface
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
        /** @var CustomerRepository $repository */
        $repository = $this->entityManager->getRepository('Sinergi\\Sage50\\Customer\\CustomerEntity');
        $items = $repository->findModifiedAfter($dateTime);
        foreach ($items as $item) {
            $this->getMapper()->mapFromSage($item);
        }
    }
}