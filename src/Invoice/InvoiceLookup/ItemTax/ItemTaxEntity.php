<?php

namespace Smart\Sage50\Invoice\InvoiceLookup\ItemTax;

use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\Invoice\InvoiceLookup\Item\ItemEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="titlulit")
 */
class ItemTaxEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="lITRecId", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $invoiceId = 0;

	/**
	 * @ORM\Id
	 * @ORM\Column(name="nLineNum", type="smallint")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $itemId = 0;

	/**
     * @ORM\ManyToOne(targetEntity="\Smart\Sage50\Invoice\InvoiceLookup\Item\ItemEntity", inversedBy="tax")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lITRecId", referencedColumnName="lITRecId"),
     *   @ORM\JoinColumn(name="nLineNum", referencedColumnName="nLineNum")
     * })
	 * @var ItemEntity
	 **/
	private $item;

	/**
	 * @ORM\Column(name="lTaxAuth", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $taxId = 0;

	/**
	 * @ORM\Column(name="bExempt", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isTaxExempt = false;

	/**
	 * @ORM\Column(name="dTaxAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $taxAmount = 0;

	/**
	 * @ORM\Column(name="lDeptId", type="integer", nullable=true)
	 * @var int
	 */
	private $departmentId;

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
	 * @return int
	 */
	public function getItemId()
	{
		return $this->itemId;
	}

	/**
	 * @param int $itemId
	 * @return $this
	 */
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		return $this;
	}

	/**
	 * @return ItemEntity
	 */
	public function getItem()
	{
		return $this->item;
	}

	/**
	 * @param ItemEntity $item
	 * @return $this
	 */
	public function setItem(ItemEntity $item)
	{
		$this->item = $item;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTaxId()
	{
		return $this->taxId;
	}

	/**
	 * @param int $taxId
	 * @return $this
	 */
	public function setTaxId($taxId)
	{
		$this->taxId = $taxId;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isTaxExempt()
	{
		return $this->isTaxExempt;
	}

	/**
	 * @param boolean $isTaxExempt
	 * @return $this
	 */
	public function setIsTaxExempt($isTaxExempt)
	{
		$this->isTaxExempt = $isTaxExempt;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTaxAmount()
	{
		return $this->taxAmount;
	}

	/**
	 * @param float $taxAmount
	 * @return $this
	 */
	public function setTaxAmount($taxAmount)
	{
		$this->taxAmount = $taxAmount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDepartmentId()
	{
		return $this->departmentId;
	}

	/**
	 * @param int $departmentId
	 * @return $this
	 */
	public function setDepartmentId($departmentId)
	{
		$this->departmentId = $departmentId;
		return $this;
	}
}
