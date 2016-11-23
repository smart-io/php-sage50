<?php

namespace Smart\Sage50\Invoice\ItemProjectAllocation;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="titlulip")
 */
class ItemProjectAllocationEntity
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
     * @ORM\Column(name="nLineNumAc", type="smallint")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
	private $invoiceItemId = 0;

    /**
     * @ORM\Id
     * @ORM\Column(name="nLineNumPj", type="smallint")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $projectAllocationLineNumber = 0;

    /**
     * @ORM\Column(name="lProjId", type="integer", nullable=true)
     * @var int
     */
    private $projectId;

    /**
     * @ORM\Column(name="dAmount", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $amount;

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
	public function getProjectAllocationLineNumber() {
		return $this->projectAllocationLineNumber;
	}

	/**
	 * @param int $projectAllocationLineNumber
	 * @return $this
	 */
	public function setProjectAllocationLineNumber($projectAllocationLineNumber) {
		$this->projectAllocationLineNumber = $projectAllocationLineNumber;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getProjectId() {
		return $this->projectId;
	}

	/**
	 * @param int $projectId
	 * @return $this
	 */
	public function setProjectId($projectId) {
		$this->projectId = $projectId;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param float $amount
	 * @return $this
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}
}
