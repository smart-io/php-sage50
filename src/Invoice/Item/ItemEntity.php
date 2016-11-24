<?php

namespace Smart\Sage50\Invoice\Item;

use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\Invoice\InvoiceEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="titrline", indexes={@ORM\Index(name="KEY_1", columns={"lInventId"})})
 */
class ItemEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="lITRecId", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $invoiceId = 0;

	/**
	 * @ORM\ManyToOne(targetEntity="\Smart\Sage50\Invoice\InvoiceEntity", inversedBy="items")
	 * @ORM\JoinColumn(name="lITRecId", referencedColumnName="lId")
	 * @var InvoiceEntity
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
	 * @ORM\Column(name="sSource", type="string", length=52, nullable=true)
	 * @var string
	 */
	private $sourceDescription;

	/**
	 * @ORM\Column(name="lInventId", type="integer", nullable=true)
	 * @var int
	 */
	private $inventoryId = 0;

	/**
	 * @ORM\Column(name="lAcctId", type="integer", nullable=true)
	 * @var int
	 */
	private $accountId = 0;

	/**
	 * @ORM\Column(name="dQty", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $quantitySold;

	/**
	 * @ORM\Column(name="dPrice", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $price = 0;

	/**
	 * @ORM\Column(name="dAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $amount;

	/**
	 * @ORM\Column(name="dCost", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $cost;

	/**
	 * @ORM\Column(name="dRev", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $revenue;

	/**
	 * @ORM\Column(name="bTsfIn", type="boolean", nullable=true)
	 * @var bool
	 */
	private $assemblyComponentsLine;

	/**
	 * @ORM\Column(name="bVarLine", type="boolean", nullable=true)
	 * @var bool
	 */
	private $varianceLine;

	/**
	 * @ORM\Column(name="bReversal", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isReversal = false;

	/**
	 * @ORM\Column(name="bService", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isServiceItem = false;

	/**
	 * @ORM\Column(name="lAcctDptId", type="integer", nullable=true)
	 * @var int
	 */
	private $accountDepartmentId;

	/**
	 * @ORM\Column(name="lInvLocId", type="integer", nullable=true)
	 * @var int
	 */
	private $inventoryLocationId = 1;

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
	 * @ORM\Column(name="bDelInv", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isDeleted;

	/**
	 * @ORM\Column(name="bUseVenItm", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isVendorInventory;

	/**
	 * @return int
	 */
	public function getInvoiceId()
	{
		return $this->invoiceId;
	}

	/**
	 * @param int $invoiceId
	 */
	public function setInvoiceId($invoiceId)
	{
		$this->invoiceId = $invoiceId;
	}

	/**
	 * @return InvoiceEntity
	 */
	public function getInvoice() {
		return $this->invoice;
	}

	/**
	 * @param InvoiceEntity $invoice
	 */
	public function setInvoice(InvoiceEntity $invoice)
	{
		$this->invoice = $invoice;
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
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getSourceDescription()
	{
		return $this->sourceDescription;
	}

	/**
	 * @param string $sourceDescription
	 */
	public function setSourceDescription($sourceDescription)
	{
		$this->sourceDescription = $sourceDescription;
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
	 */
	public function setInventoryId($inventoryId)
	{
		$this->inventoryId = $inventoryId;
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
	 */
	public function setAccountId($accountId)
	{
		$this->accountId = $accountId;
	}

	/**
	 * @return float
	 */
	public function getQuantitySold()
	{
		return $this->quantitySold;
	}

	/**
	 * @param float $quantitySold
	 */
	public function setQuantitySold($quantitySold)
	{
		$this->quantitySold = $quantitySold;
	}

	/**
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 */
	public function setPrice($price)
	{
		$this->price = $price;
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
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	/**
	 * @return float
	 */
	public function getCost()
	{
		return $this->cost;
	}

	/**
	 * @param float $cost
	 */
	public function setCost($cost)
	{
		$this->cost = $cost;
	}

	/**
	 * @return float
	 */
	public function getRevenue()
	{
		return $this->revenue;
	}

	/**
	 * @param float $revenue
	 */
	public function setRevenue($revenue)
	{
		$this->revenue = $revenue;
	}

	/**
	 * @return boolean
	 */
	public function isAssemblyComponentsLine()
	{
		return $this->assemblyComponentsLine;
	}

	/**
	 * @param boolean $assemblyComponentsLine
	 */
	public function setAssemblyComponentsLine($assemblyComponentsLine)
	{
		$this->assemblyComponentsLine = $assemblyComponentsLine;
	}

	/**
	 * @return boolean
	 */
	public function isVarianceLine()
	{
		return $this->varianceLine;
	}

	/**
	 * @param boolean $varianceLine
	 */
	public function setVarianceLine($varianceLine)
	{
		$this->varianceLine = $varianceLine;
	}

	/**
	 * @return boolean
	 */
	public function isReversal()
	{
		return $this->isReversal;
	}

	/**
	 * @param boolean $isReversal
	 */
	public function setIsReversal($isReversal)
	{
		$this->isReversal = $isReversal;
	}

	/**
	 * @return boolean
	 */
	public function isServiceItem()
	{
		return $this->isServiceItem;
	}

	/**
	 * @param boolean $isServiceItem
	 */
	public function setIsServiceItem($isServiceItem)
	{
		$this->isServiceItem = $isServiceItem;
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
	 */
	public function setAccountDepartmentId($accountDepartmentId)
	{
		$this->accountDepartmentId = $accountDepartmentId;
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
	 */
	public function setInventoryLocationId($inventoryLocationId)
	{
		$this->inventoryLocationId = $inventoryLocationId;
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
	 */
	public function setIsDefaultPrice($isDefaultPrice)
	{
		$this->isDefaultPrice = $isDefaultPrice;
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
	 */
	public function setPriceListId($priceListId)
	{
		$this->priceListId = $priceListId;
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
	 */
	public function setItemBasePrice($itemBasePrice)
	{
		$this->itemBasePrice = $itemBasePrice;
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
	 */
	public function setLineDiscountPercentage($lineDiscountPercentage)
	{
		$this->lineDiscountPercentage = $lineDiscountPercentage;
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
	 */
	public function setIsDefaultBasePrice($isDefaultBasePrice)
	{
		$this->isDefaultBasePrice = $isDefaultBasePrice;
	}

	/**
	 * @return boolean
	 */
	public function isDeleted()
	{
		return $this->isDeleted;
	}

	/**
	 * @param boolean $isDeleted
	 */
	public function setIsDeleted($isDeleted)
	{
		$this->isDeleted = $isDeleted;
	}

	/**
	 * @return boolean
	 */
	public function isVendorInventory()
	{
		return $this->isVendorInventory;
	}

	/**
	 * @param boolean $isVendorInventory
	 */
	public function setIsVendorInventory($isVendorInventory)
	{
		$this->isVendorInventory = $isVendorInventory;
	}
}
