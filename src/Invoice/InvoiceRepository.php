<?php

namespace Smart\Sage50\Invoice;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Smart\Sage50\RepositoryInterface;

class InvoiceRepository extends EntityRepository implements RepositoryInterface
{
	/**
	 * @param DateTime $dateTime
	 * @return InvoiceEntity[]
	 */
    public function fetchAllSince(DateTime $dateTime)
    {
	    $date = $dateTime->format('Y-m-d') . ' 00:00:00';
	    $time = '1899-12-30 ' . $dateTime->format('H:i:s');
	    return $this->createQueryBuilder('i')
	                ->where('i.modificationDate > :date')
	                ->orWhere('i.modificationDate = :date AND i.modificationTime > :time')
	                ->setParameter('date', $date)
	                ->setParameter('time', $time)
	                ->getQuery()
	                ->getResult();
    }
}
