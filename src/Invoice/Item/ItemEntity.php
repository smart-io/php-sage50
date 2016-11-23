<?php

namespace Smart\Sage50\Invoice\Item;

use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\Invoice\InvoiceEntity;
use Smart\Sage50\Invoice\ItemTax\ItemTaxEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="titluli")
 */
class ItemEntity
{
	const UNIT_TYPE_STOCKING_UNITS = 1;
	const UNIT_TYPE_BUYING_UNITS = 2;
	const UNIT_TYPE_SELLING_UNITS = 3;

	/**
	 * @ORM\Id
	 * @ORM\Column(name="lITRecId", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $invoiceId = 0;

	/**
	 * @ORM\ManyToOne(targetEntity="\Smart\Sage50\Invoice\InvoiceEntity", inversedBy="items")
	 * @ORM\JoinColumn(name="lITRecId", referencedColumnName="lITRecId")
	 */
	private $invoice;

	/**
	 * @ORM\Id
	 * @ORM\Column(name="nLineNum", type="smallint")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $id = 0;

	/**
	 * @ORM\OneToOne(targetEntity="\Smart\Sage50\Invoice\ItemTax\ItemTaxEntity", mappedBy="item")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="lITRecId", referencedColumnName="lITRecId"),
	 *   @ORM\JoinColumn(name="nLineNum", referencedColumnName="nLineNum")
	 * })
	 * @var \Smart\Sage50\Invoice\ItemTax\ItemTaxEntity
	 **/
	private $tax;

	/**
	 * @ORM\Column(name="sItem", type="string", length=52, nullable=true)
	 * @var string
	 */
	private $itemNumber;

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
	 * @ORM\Column(name="dAmtInclTx", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $subtotal;

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
	 * @ORM\Column(name="dPrice", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $itemPrice = 0;

	/**
	 * @ORM\Column(name="dDutyPer", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $dutyPercentage;

	/**
	 * @ORM\Column(name="dDutyAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $dutyAmount;

	/**
	 * @ORM\Column(name="bFreight", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isFreightItem;

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
	 * @ORM\Column(name="dTaxAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $taxes;

	/**
	 * @ORM\Column(name="bTSLine", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isTimeSlipItem;

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
	 * @ORM\Column(name="dVenRel", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $vendorRelationship;

	/**
	 * @ORM\Column(name="bVenToStk", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isVendorToStock;

	/**
	 * @ORM\Column(name="bDefDesc", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isDefaultDescriptionUsed;

	/**
	 * @return int
	 */
	public function getInvoiceId()
	{
		return $this->invoiceId;
	}

	/**
	 * @param int $invoiceId
	 * @return $this
	 */
	public function setInvoiceId($invoiceId)
	{
		$this->invoiceId = $invoiceId;
		return $this;
	}

	/**
	 * @return InvoiceEntity
	 */
	public function getInvoice()
	{
		return $this->invoice;
	}

	/**
	 * @param InvoiceEntity $invoice
	 * @return $this
	 */
	public function setInvoice(InvoiceEntity $invoice)
	{
		$this->invoice = $invoice;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return \Smart\Sage50\Invoice\ItemTax\ItemTaxEntity
	 */
	public function getTax()
	{
		return $this->tax;
	}

	/**
	 * @param \Smart\Sage50\Invoice\ItemTax\ItemTaxEntity $tax
	 * @return $this
	 */
	public function setTax(ItemTaxEntity $tax)
	{
		$this->tax = $tax;
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
	public function getSubtotal()
	{
		return $this->subtotal;
	}

	/**
	 * @param float $subtotal
	 * @return $this
	 */
	public function setSubtotal($subtotal)
	{
		$this->subtotal = $subtotal;
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
	 * @return float
	 */
	public function getDutyPercentage()
	{
		return $this->dutyPercentage;
	}

	/**
	 * @param float $dutyPercentage
	 * @return $this
	 */
	public function setDutyPercentage($dutyPercentage)
	{
		$this->dutyPercentage = $dutyPercentage;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getDutyAmount()
	{
		return $this->dutyAmount;
	}

	/**
	 * @param float $dutyAmount
	 * @return $this
	 */
	public function setDutyAmount($dutyAmount)
	{
		$this->dutyAmount = $dutyAmount;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isFreightItem()
	{
		return $this->isFreightItem;
	}

	/**
	 * @param boolean $isFreightItem
	 * @return $this
	 */
	public function setIsFreightItem($isFreightItem)
	{
		$this->isFreightItem = $isFreightItem;
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
	 * @return float
	 */
	public function getTaxes()
	{
		return $this->taxes;
	}

	/**
	 * @param float $taxes
	 * @return $this
	 */
	public function setTaxes($taxes)
	{
		$this->taxes = $taxes;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isTimeSlipItem()
	{
		return $this->isTimeSlipItem;
	}

	/**
	 * @param boolean $isTimeSlipItem
	 * @return $this
	 */
	public function setIsTimeSlipItem($isTimeSlipItem)
	{
		$this->isTimeSlipItem = $isTimeSlipItem;
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
	 * @return float
	 */
	public function getVendorRelationship()
	{
		return $this->vendorRelationship;
	}

	/**
	 * @param float $vendorRelationship
	 * @return $this
	 */
	public function setVendorRelationship($vendorRelationship)
	{
		$this->vendorRelationship = $vendorRelationship;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isVendorToStock()
	{
		return $this->isVendorToStock;
	}

	/**
	 * @param boolean $isVendorToStock
	 * @return $this
	 */
	public function setIsVendorToStock($isVendorToStock)
	{
		$this->isVendorToStock = $isVendorToStock;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isDefaultDescriptionUsed()
	{
		return $this->isDefaultDescriptionUsed;
	}

	/**
	 * @param boolean $isDefaultDescriptionUsed
	 * @return $this
	 */
	public function setIsDefaultDescriptionUsed($isDefaultDescriptionUsed)
	{
		$this->isDefaultDescriptionUsed = $isDefaultDescriptionUsed;
		return $this;
	}
}
