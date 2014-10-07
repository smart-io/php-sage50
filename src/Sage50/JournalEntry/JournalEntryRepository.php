<?php
namespace Sinergi\Sage50\JournalEntry;

use Doctrine\ORM\EntityRepository;

class JournalEntryRepository extends EntityRepository
{
    public function fetchNextJournalEntryId()
    {
        $result = $this->createQueryBuilder('j')
            ->orderBy('id', 'DESC')
            ->getQuery()
            ->getFirstResult();

        if ($result instanceof JournalEntryEntity) {
            return $result->getId() + 1;
        }
        return 1;
    }
}
