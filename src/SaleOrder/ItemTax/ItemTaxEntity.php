<?php

namespace Smart\Sage50\SaleOrder\ItemTax;

use Doctrine\ORM\Mapping as ORM;

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
    private $saleOrderId = 0;

    /**
     * @ORM\Id
     * @ORM\Column(name="nLineNum", type="smallint")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $saleOrderItemId = 0;

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
