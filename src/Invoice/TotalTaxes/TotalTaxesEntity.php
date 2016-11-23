<?php

namespace Smart\Sage50\Invoice\TotalTaxes;

use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\Invoice\InvoiceEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="titlutot")
 */
class TotalTaxesEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="lITRecId", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $invoiceId = 0;

	/**
	 * @ORM\OneToOne(targetEntity="\Smart\Sage50\Invoice\InvoiceEntity", mappedBy="totalTaxes")
	 * @ORM\JoinColumn(name="lITRecId", referencedColumnName="lITRecId")
	 * @var \Smart\Sage50\Invoice\InvoiceEntity
	 **/
	private $invoice;

	/**
	 * @ORM\Id
	 * @ORM\Column(name="lTaxAuth", type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	private $taxId = 0;

	/**
	 * @ORM\Column(name="dTaxAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $taxAmount = 0;

	/**
	 * @ORM\Column(name="dNonRef", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $nonRefundableTaxAmount = 0;

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
	public function setInvoice($invoice)
	{
		$this->invoice = $invoice;
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
	 * @return float
	 */
	public function getNonRefundableTaxAmount()
	{
		return $this->nonRefundableTaxAmount;
	}

	/**
	 * @param float $nonRefundableTaxAmount
	 * @return $this
	 */
	public function setNonRefundableTaxAmount($nonRefundableTaxAmount)
	{
		$this->nonRefundableTaxAmount = $nonRefundableTaxAmount;
		return $this;
	}
}
