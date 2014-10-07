<?php
namespace Sinergi\Sage50\NextPrimaryKey;

use Doctrine\ORM\EntityRepository;

class NextPrimaryKeyRepository extends EntityRepository
{
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
