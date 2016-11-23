<?php

namespace Smart\Sage50\SaleOrder;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Smart\Sage50\RepositoryInterface;

class SaleOrderRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * @param DateTime $dateTime
     * @return SaleOrderEntity[]
     */
    public function fetchAllSince(DateTime $dateTime)
    {
        $date = $dateTime->format('Y-m-d') . ' 00:00:00';
        $time = '1899-12-30 ' . $dateTime->format('H:i:s');
        return $this->createQueryBuilder('s')
            ->where('s.modificationDate > :date')
            ->orWhere('s.modificationDate = :date AND s.modificationTime > :time')
            ->setParameter('date', $date)
            ->setParameter('time', $time)
            ->getQuery()
            ->getResult();
    }

	/**
	 * @param int $id
	 * @throws Exception
	 */
	public function fetchNewAfterId($id)
    {
	    throw new Exception('Sales Order do not support fetch new after ID');
    }
}
