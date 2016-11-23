<?php

namespace Smart\Sage50\Invoice\ItemTax;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="titlulit")
 */
class ItemTax
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
	private $invoiceItemId = 0;

    /**
     * @ORM\Id
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
	public function getInvoiceId() {
		return $this->invoiceId;
	}

	/**
	 * @param int $invoiceId
	 * @return $this
	 */
	public function setInvoiceId($invoiceId) {
		$this->invoiceId = $invoiceId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getInvoiceItemId() {
		return $this->invoiceItemId;
	}

	/**
	 * @param int $invoiceItemId
	 * @return $this
	 */
	public function setInvoiceItemId($invoiceItemId) {
		$this->invoiceItemId = $invoiceItemId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTaxId() {
		return $this->taxId;
	}

	/**
	 * @param int $taxId
	 * @return $this
	 */
	public function setTaxId($taxId) {
		$this->taxId = $taxId;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isTaxExempt() {
		return $this->isTaxExempt;
	}

	/**
	 * @param boolean $isTaxExempt
	 * @return $this
	 */
	public function setIsTaxExempt($isTaxExempt) {
		$this->isTaxExempt = $isTaxExempt;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTaxAmount() {
		return $this->taxAmount;
	}

	/**
	 * @param float $taxAmount
	 * @return $this
	 */
	public function setTaxAmount($taxAmount) {
		$this->taxAmount = $taxAmount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDepartmentId() {
		return $this->departmentId;
	}

	/**
	 * @param int $departmentId
	 * @return $this
	 */
	public function setDepartmentId($departmentId) {
		$this->departmentId = $departmentId;
		return $this;
	}
}
