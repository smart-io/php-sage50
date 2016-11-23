<?php

namespace Smart\Sage50\LocationInventory;

use Doctrine\ORM\EntityRepository;

class LocationInventoryRepository extends EntityRepository
{
    /**
     * @param int $inventoryId
     * @param int $inventoryLocationId
     * @param int $quantity
     * @return int
     */
    public function increaseInventoryOnSalesOrder($inventoryId, $inventoryLocationId, $quantity)
    {
        $locationInventory = $this->findBy([
            'inventoryId' => $inventoryId,
            'inventoryLocationId' => $inventoryLocationId
        ]);
        if ($locationInventory instanceof LocationInventoryEntity) {
            $locationInventory->setQuantityOnSalesOrder($locationInventory->getQuantityOnSalesOrder() + $quantity);
            $this->_em->persist($locationInventory);
            return $locationInventory->getQuantityOnSalesOrder() + $quantity;
        }
        return null;
    }
}
