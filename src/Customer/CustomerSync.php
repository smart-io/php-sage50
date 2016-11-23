<?php

namespace Smart\Sage50\Customer;

use DateTime;
use Smart\Sage50\Exception\InvalidMapperException;
use Smart\Sage50\Exception\InvalidRepositoryException;
use Smart\Sage50\MapperEventsInterface;
use Smart\Sage50\MapperFromSage50Interface;
use Smart\Sage50\MapperToSage50Interface;
use Smart\Sage50\RepositoryInterface;
use Smart\Sage50\Sync;

class CustomerSync extends Sync
{
    public function syncFromSage50(DateTime $dateTime)
    {
        $mapper = $this->getMapper();
        if (null === $mapper || !($mapper instanceof MapperFromSage50Interface)) {
            throw new InvalidMapperException();
        }
        /** @var CustomerRepository $repository */
        $repository = $this->entityManager->getRepository('Smart\\Sage50\\Customer\\CustomerEntity');
        $items = $repository->fetchAllSince($dateTime);
        foreach ($items as $item) {
            $mappedItem = $mapper->mapFromSage50($item);
            if ($mapper instanceof MapperEventsInterface) {
                $mapper->onItemComplete($mappedItem);
            }
        }
        if ($mapper instanceof MapperEventsInterface) {
            $mapper->onComplete();
        }
    }

    public function syncToSage50(DateTime $dateTime)
    {
        $mapper = $this->getMapper();
        if (null === $mapper || !($mapper instanceof MapperToSage50Interface)) {
            throw new InvalidMapperException();
        }

        $repository = $this->getRepository();
        if (!$repository || !($repository instanceof RepositoryInterface)) {
            throw new InvalidRepositoryException();
        }
        $items = $repository->fetchAllSince($dateTime);
        foreach ($items as $item) {
            $mappedItem = $mapper->mapToSage50($item);
            if ($mapper instanceof MapperEventsInterface) {
                $mapper->onItemComplete($mappedItem);
            }
        }
        if ($mapper instanceof MapperEventsInterface) {
            $mapper->onComplete();
        }
    }
}
