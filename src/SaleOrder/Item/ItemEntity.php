<?php

namespace Smart\Sage50\SaleOrder\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tsoline")
 */
class ItemEntity
{
    const UNIT_TYPE_STOCKING_UNITS = 1;
    const UNIT_TYPE_BUYING_UNITS = 2;
    const UNIT_TYPE_SELLING_UNITS = 3;

    /**
     * @ORM\Id
     * @ORM\Column(name="lSOId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $saleOrderId = 0;

    /**
     * @ORM\Id
     * @ORM\Column(name="nLineNum", type="smallint")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $saleOrderItemId = 0;

    /**
     * @ORM\Column(name="lInventId", type="integer", nullable=true)
     * @var int
     */
    private $inventoryId = 0;

    /**
     * @ORM\Column(name="sPartCode", type="string", length=52, nullable=true)
     * @var string
     */
    private $itemNumber = '';

    /**
     * @ORM\Column(name="dQuantity", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $quantityReceived = 0;

    /**
     * @ORM\Column(name="dOrdered", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $quantityOrdered = 0;

    /**
     * @ORM\Column(name="dRemaining", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $quantityBackOrder = 0;

    /**
     * @ORM\Column(name="sUnits", type="string", length=15, nullable=true)
     * @var string
     */
    private $unit = '';

    /**
     * @ORM\Column(name="nUnitType", type="smallint", nullable=true)
     * @var int
     */
    private $unitType = self::UNIT_TYPE_SELLING_UNITS;

    /**
     * @ORM\Column(name="sDesc", type="string", length=255, nullable=true)
     * @var string
     */
    private $itemDescription = '';

    /**
     * @ORM\Column(name="dPrice", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $itemPrice = 0;

    /**
     * @ORM\Column(name="lTaxCode", type="integer", nullable=true)
     * @var int
     */
    private $taxCodeId = 0;

    /**
     * @ORM\Column(name="lTaxRev", type="integer", nullable=true)
     * @var int
     */
    private $taxRevision = 0;

    /**
     * @ORM\Column(name="bFreight", type="boolean", nullable=true)
     * @var bool
     */
    private $isFreightLine = false;

    /**
     * @ORM\Column(name="dAmount", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $amount = 0;

    /**
     * @ORM\Column(name="lAcctId", type="integer", nullable=true)
     * @var int
     */
    private $accountId = 0;

    /**
     * @ORM\Column(name="bInvItem", type="boolean", nullable=true)
     * @var bool
     */
    private $isInventoryItem = true;

    /**
     * @ORM\Column(name="lAcctDptId", type="integer", nullable=true)
     * @var int
     */
    private $accountDepartmentId = 0;

    /**
     * @ORM\Column(name="lInvLocId", type="integer", nullable=true)
     * @var int
     */
    private $inventoryLocationId = 0;

    /**
     * @ORM\Column(name="bDefPrc", type="boolean", nullable=true)
     * @var bool
     */
    private $isDefaultPrice = true;

    /**
     * @ORM\Column(name="lPrcListId", type="integer", nullable=true)
     * @var int
     */
    private $priceListId = 0;

    /**
     * @ORM\Column(name="dBasePrice", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $itemBasePrice = 0;

    /**
     * @ORM\Column(name="dLineDisc", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $lineDiscountPercentage = 0;

    /**
     * @ORM\Column(name="bDefBsPric", type="boolean", nullable=true)
     * @var bool
     */
    private $isDefaultBasePrice = true;

    /**
     * @return int
     */
    public function getSaleOrderId()
    {
        return $this->saleOrderId;
    }

    /**
     * @param int $saleOrderId
     * @return $this
     */
    public function setSaleOrderId($saleOrderId)
    {
        $this->saleOrderId = $saleOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSaleOrderItemId()
    {
        return $this->saleOrderItemId;
    }

    /**
     * @param int $saleOrderItemId
     * @return $this
     */
    public function setSaleOrderItemId($saleOrderItemId)
    {
        $this->saleOrderItemId = $saleOrderItemId;
        return $this;
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
     * @return string
     */
    public function getItemNumber()
    {
        return $this->itemNumber;
    }

    /**
     * @param string $itemNumber
     * @return $this
     */
    public function setItemNumber($itemNumber)
    {
        $this->itemNumber = $itemNumber;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityReceived()
    {
        return $this->quantityReceived;
    }

    /**
     * @param float $quantityReceived
     * @return $this
     */
    public function setQuantityReceived($quantityReceived)
    {
        $this->quantityReceived = $quantityReceived;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }

    /**
     * @param float $quantityOrdered
     * @return $this
     */
    public function setQuantityOrdered($quantityOrdered)
    {
        $this->quantityOrdered = $quantityOrdered;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityBackOrder()
    {
        return $this->quantityBackOrder;
    }

    /**
     * @param float $quantityBackOrder
     * @return $this
     */
    public function setQuantityBackOrder($quantityBackOrder)
    {
        $this->quantityBackOrder = $quantityBackOrder;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     * @return $this
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     * @param int $unitType
     * @return $this
     */
    public function setUnitType($unitType)
    {
        $this->unitType = $unitType;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * @param string $itemDescription
     * @return $this
     */
    public function setItemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @param float $itemPrice
     * @return $this
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxCodeId()
    {
        return $this->taxCodeId;
    }

    /**
     * @param int $taxCodeId
     * @return $this
     */
    public function setTaxCodeId($taxCodeId)
    {
        $this->taxCodeId = $taxCodeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxRevision()
    {
        return $this->taxRevision;
    }

    /**
     * @param int $taxRevision
     * @return $this
     */
    public function setTaxRevision($taxRevision)
    {
        $this->taxRevision = $taxRevision;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFreightLine()
    {
        return $this->isFreightLine;
    }

    /**
     * @param boolean $isFreightLine
     * @return $this
     */
    public function setFreightLine($isFreightLine)
    {
        $this->isFreightLine = $isFreightLine;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return $this
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isInventoryItem()
    {
        return $this->isInventoryItem;
    }

    /**
     * @param boolean $isInventoryItem
     * @return $this
     */
    public function setIsInventoryItem($isInventoryItem)
    {
        $this->isInventoryItem = $isInventoryItem;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountDepartmentId()
    {
        return $this->accountDepartmentId;
    }

    /**
     * @param int $accountDepartmentId
     * @return $this
     */
    public function setAccountDepartmentId($accountDepartmentId)
    {
        $this->accountDepartmentId = $accountDepartmentId;
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
     * @return boolean
     */
    public function isDefaultPrice()
    {
        return $this->isDefaultPrice;
    }

    /**
     * @param boolean $isDefaultPrice
     * @return $this
     */
    public function setIsDefaultPrice($isDefaultPrice)
    {
        $this->isDefaultPrice = $isDefaultPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriceListId()
    {
        return $this->priceListId;
    }

    /**
     * @param int $priceListId
     * @return $this
     */
    public function setPriceListId($priceListId)
    {
        $this->priceListId = $priceListId;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemBasePrice()
    {
        return $this->itemBasePrice;
    }

    /**
     * @param float $itemBasePrice
     * @return $this
     */
    public function setItemBasePrice($itemBasePrice)
    {
        $this->itemBasePrice = $itemBasePrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineDiscountPercentage()
    {
        return $this->lineDiscountPercentage;
    }

    /**
     * @param float $lineDiscountPercentage
     * @return $this
     */
    public function setLineDiscountPercentage($lineDiscountPercentage)
    {
        $this->lineDiscountPercentage = $lineDiscountPercentage;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefaultBasePrice()
    {
        return $this->isDefaultBasePrice;
    }

    /**
     * @param boolean $isDefaultBasePrice
     * @return $this
     */
    public function setIsDefaultBasePrice($isDefaultBasePrice)
    {
        $this->isDefaultBasePrice = $isDefaultBasePrice;
        return $this;
    }
}
