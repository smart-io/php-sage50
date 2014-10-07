<?php
namespace Sinergi\Sage50\Customer;

use DateTime;
use Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository
{
    /**
     * @param DateTime $dateTime
     * @return CustomerEntity[]
     */
    public function findModifiedAfter(DateTime $dateTime)
    {
        $date = $dateTime->format('Y-m-d') . ' 00:00:00';
        $time = '1899-12-30 ' . $dateTime->format('H:i:s');
        return $this->createQueryBuilder('c')
            ->where('c.modificationDate > :date')
            ->andWhere('c.modificationTime > :time')
            ->setParameter('date', $date)
            ->setParameter('time', $time)
            ->getQuery()
            ->getResult();
    }
}
