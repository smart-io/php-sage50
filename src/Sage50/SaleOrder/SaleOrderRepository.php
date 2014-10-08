<?php
namespace Sinergi\Sage50\SaleOrder;

use DateTime;
use Doctrine\ORM\EntityRepository;

class SaleOrderRepository extends EntityRepository
{
    /**
     * @param DateTime $dateTime
     * @return SaleOrderEntity[]
     */
    public function findModifiedAfter(DateTime $dateTime)
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
}
