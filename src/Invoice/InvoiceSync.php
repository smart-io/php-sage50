<?php

namespace Smart\Sage50\Invoice;

use DateTime;
use Smart\Sage50\MapperEventsInterface;
use Smart\Sage50\MapperFromSage50Interface;
use Smart\Sage50\Sync;
use Smart\Sage50\SyncFromSage50ByIdInterface;
use Smart\Sage50\SyncToSage50Interface;

class InvoiceSync extends Sync implements SyncFromSage50ByIdInterface, SyncToSage50Interface
{
    public function syncFromSage50($id)
    {
        $mapper = $this->getMapper();
        if (null === $mapper || !($mapper instanceof MapperFromSage50Interface)) {
            throw new InvalidMapperException();
        }
        /** @var InvoiceRepository $repository */
        $repository = $this->entityManager->getRepository('Smart\\Sage50\\Invoice\\InvoiceEntity');
        $items = $repository->fetchNewAfterId($id);
        foreach ($items as $item) {
            $mappedItem = $mapper->mapFromSage50($item);
            if ($mapper instanceof MapperEventsInterface) {
                $mapper->onItemComplete($mappedItem);
            }
        }
        if ($this->mapper instanceof MapperEventsInterface) {
            $this->mapper->onComplete();
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
