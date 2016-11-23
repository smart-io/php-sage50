<?php

namespace Smart\Sage50\SalesOrder\TotalTaxes;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tsotot")
 */
class TotalTaxesEntity
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
