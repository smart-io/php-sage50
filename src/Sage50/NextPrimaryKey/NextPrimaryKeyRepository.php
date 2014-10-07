<?php
namespace Sinergi\Sage50\NextPrimaryKey;

use Doctrine\ORM\EntityRepository;

class NextPrimaryKeyRepository extends EntityRepository
{
    /**
     * @param int $id
     * @return int|null
     */
    public function increaseNextId($id)
    {
        $nextPrimaryKey = $this->find($id);
        if ($nextPrimaryKey instanceof NextPrimaryKeyEntity) {
            $nextPrimaryKey->setNextId($nextPrimaryKey->getNextId() + 1);
            $this->_em->persist($nextPrimaryKey);
            return $nextPrimaryKey->getNextId() + 1;
        }
        return null;
    }

    /**
     * @return int|null
     */
    public function increaseNextSaleOrderId()
    {
        return $this->increaseNextId(NextPrimaryKeyEntity::SALE_ORDER_ID);
    }

    /**
     * @param int $id
     * @return int
     */
    public function fetchNextId($id)
    {
        $result = $this->find($id);
        if ($result instanceof NextPrimaryKeyEntity) {
            return $result->getNextId();
        }
        return 1;
    }

    /**
     * @return int
     */
    public function fetchNextSaleOrderId()
    {
        return $this->fetchNextId(NextPrimaryKeyEntity::SALE_ORDER_ID);
    }
}
