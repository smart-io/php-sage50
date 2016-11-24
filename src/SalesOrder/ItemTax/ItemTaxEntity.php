<?php

namespace Smart\Sage50\SalesOrder\ItemTax;

use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\SalesOrder\Item\ItemEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="tsolinet")
 */
class ItemTaxEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lSORecId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $salesOrderId = 0;

    /**
     * @ORM\Id
     * @ORM\Column(name="nLineNum", type="smallint")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $itemId = 0;

	/**
     * @ORM\ManyToOne(targetEntity="\Smart\Sage50\SalesOrder\Item\ItemEntity", inversedBy="tax")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lSORecId", referencedColumnName="lSORecId"),
     *   @ORM\JoinColumn(name="nLineNum", referencedColumnName="nLineNum")
     * })
	 * @var ItemEntity
	 */
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
     * @ORM\Column(name="bTaxAmtDef", type="boolean", nullable=true)
     * @var bool
     */
    private $isUsingTaxAmount = true;

    /**
     * @ORM\Column(name="dTaxAmt", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $taxAmount = 0;

    /**
     * @return int
     */
    public function getSalesOrderId()
    {
        return $this->salesOrderId;
    }

    /**
     * @param int $salesOrderId
     * @return $this
     */
    public function setSalesOrderId($salesOrderId)
    {
        $this->salesOrderId = $salesOrderId;
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
	public function setItem($item)
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
     * @return boolean
     */
    public function isUsingTaxAmount()
    {
        return $this->isUsingTaxAmount;
    }

    /**
     * @param boolean $isUsingTaxAmount
     * @return $this
     */
    public function setIsUsingTaxAmount($isUsingTaxAmount)
    {
        $this->isUsingTaxAmount = $isUsingTaxAmount;
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
}
