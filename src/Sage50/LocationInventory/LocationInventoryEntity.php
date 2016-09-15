<?php

namespace Smart\Sage50\LocationInventory;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tinvbyln")
 */
class LocationInventoryEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lInventId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $inventoryId = 0;

    /**
     * @ORM\Id
     * @ORM\Column(name="lInvLocId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $inventoryLocationId = 0;

    /**
     * @ORM\Column(name="dtASDate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $modificationDate;

    /**
     * @ORM\Column(name="tmASTime", type="datetime", nullable=true)
     * @var DateTime
     */
    private $modificationTime;

    /**
     * @ORM\Column(name="sASUserId", type="string", length=14, nullable=true)
     * @var string
     */
    private $createdByUsername = 'sysadmin';

    /**
     * @ORM\Column(name="sASOrgId", type="string", length=6, nullable=true)
     * @var string
     */
    private $createdByOrg = 'winsim';

    /**
     * @ORM\Column(name="dInStock", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $itemsInStockQuantity;

    /**
     * @ORM\Column(name="dCostStk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $itemsInStockCost;

    /**
     * @ORM\Column(name="dOrderPt", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $orderPoint;

    /**
     * @ORM\Column(name="dLastCost", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $lastUnitSellingPrice;

    /**
     * @ORM\Column(name="dQtyOnOrd", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $quantityOnPurchaseOrder;

    /**
     * @ORM\Column(name="dLastPPrce", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $lastPurchaseUnitPrice;

    /**
     * @ORM\Column(name="dQOnSalOrd", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $quantityOnSaleOrder;

    /**
     * @ORM\Column(name="dHInStock", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $historicalItemsInStockQuantity;

    /**
     * @ORM\Column(name="dHCostStk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $historicalItemsInStockCost;

    public function __construct()
    {
        $this->setModificationDate(new DateTime(date('Y-m-d 00:00:00')));
        $this->setModificationTime(new DateTime(date('1899-12-30 H:i:s')));
    }

    /**
     * @return int
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * @param int $inventoryId
     * @return $this
     */
    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getInventoryLocationId()
    {
        return $this->inventoryLocationId;
    }

    /**
     * @param int $inventoryLocationId
     * @return $this
     */
    public function setInventoryLocationId($inventoryLocationId)
    {
        $this->inventoryLocationId = $inventoryLocationId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param DateTime $modificationDate
     * @return $this
     */
    public function setModificationDate(DateTime $modificationDate)
    {
        $this->modificationDate = $modificationDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationTime()
    {
        return $this->modificationTime;
    }

    /**
     * @param DateTime $modificationTime
     * @return $this
     */
    public function setModificationTime(DateTime $modificationTime)
    {
        $this->modificationTime = $modificationTime;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationDatetime()
    {
        return new DateTime($this->modificationDate->format('Y-m-d') . ' ' . $this->modificationTime->format('H:i:s'));
    }

    /**
     * @return string
     */
    public function getCreatedByUsername()
    {
        return $this->createdByUsername;
    }

    /**
     * @param string $createdByUsername
     * @return $this
     */
    public function setCreatedByUsername($createdByUsername)
    {
        $this->createdByUsername = $createdByUsername;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedByOrg()
    {
        return $this->createdByOrg;
    }

    /**
     * @param string $createdByOrg
     * @return $this
     */
    public function setCreatedByOrg($createdByOrg)
    {
        $this->createdByOrg = $createdByOrg;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemsInStockQuantity()
    {
        return $this->itemsInStockQuantity;
    }

    /**
     * @param float $itemsInStockQuantity
     * @return $this
     */
    public function setItemsInStockQuantity($itemsInStockQuantity)
    {
        $this->itemsInStockQuantity = $itemsInStockQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemsInStockCost()
    {
        return $this->itemsInStockCost;
    }

    /**
     * @param float $itemsInStockCost
     * @return $this
     */
    public function setItemsInStockCost($itemsInStockCost)
    {
        $this->itemsInStockCost = $itemsInStockCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderPoint()
    {
        return $this->orderPoint;
    }

    /**
     * @param float $orderPoint
     * @return $this
     */
    public function setOrderPoint($orderPoint)
    {
        $this->orderPoint = $orderPoint;
        return $this;
    }

    /**
     * @return float
     */
    public function getLastUnitSellingPrice()
    {
        return $this->lastUnitSellingPrice;
    }

    /**
     * @param float $lastUnitSellingPrice
     * @return $this
     */
    public function setLastUnitSellingPrice($lastUnitSellingPrice)
    {
        $this->lastUnitSellingPrice = $lastUnitSellingPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityOnPurchaseOrder()
    {
        return $this->quantityOnPurchaseOrder;
    }

    /**
     * @param float $quantityOnPurchaseOrder
     * @return $this
     */
    public function setQuantityOnPurchaseOrder($quantityOnPurchaseOrder)
    {
        $this->quantityOnPurchaseOrder = $quantityOnPurchaseOrder;
        return $this;
    }

    /**
     * @return float
     */
    public function getLastPurchaseUnitPrice()
    {
        return $this->lastPurchaseUnitPrice;
    }

    /**
     * @param float $lastPurchaseUnitPrice
     * @return $this
     */
    public function setLastPurchaseUnitPrice($lastPurchaseUnitPrice)
    {
        $this->lastPurchaseUnitPrice = $lastPurchaseUnitPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityOnSaleOrder()
    {
        return $this->quantityOnSaleOrder;
    }

    /**
     * @param float $quantityOnSaleOrder
     * @return $this
     */
    public function setQuantityOnSaleOrder($quantityOnSaleOrder)
    {
        $this->quantityOnSaleOrder = $quantityOnSaleOrder;
        return $this;
    }

    /**
     * @return float
     */
    public function getHistoricalItemsInStockQuantity()
    {
        return $this->historicalItemsInStockQuantity;
    }

    /**
     * @param float $historicalItemsInStockQuantity
     * @return $this
     */
    public function setHistoricalItemsInStockQuantity($historicalItemsInStockQuantity)
    {
        $this->historicalItemsInStockQuantity = $historicalItemsInStockQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getHistoricalItemsInStockCost()
    {
        return $this->historicalItemsInStockCost;
    }

    /**
     * @param float $historicalItemsInStockCost
     * @return $this
     */
    public function setHistoricalItemsInStockCost($historicalItemsInStockCost)
    {
        $this->historicalItemsInStockCost = $historicalItemsInStockCost;
        return $this;
    }
}
