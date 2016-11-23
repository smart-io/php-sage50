<?php

namespace Smart\Sage50\Tax;

use Smart\Sage50\Tax\TaxCode\TaxCodeEntity;
use Smart\Sage50\Tax\TaxAuthority\TaxAuthorityEntity;

class TaxEntity
{
    /**
     * @var TaxCodeEntity
     */
    private $taxCode;

    /**
     * @var TaxAuthorityEntity
     */
    private $taxAuthority;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rate;

    /**
     * @var boolean
     */
    private $isCompound;

    /**
     * @return TaxCodeEntity
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * @param TaxCodeEntity $taxCode
     * @return $this
     */
    public function setTaxCode(TaxCodeEntity $taxCode)
    {
        $this->taxCode = $taxCode;
        return $this;
    }

    /**
     * @return TaxAuthorityEntity
     */
    public function getTaxAuthority()
    {
        return $this->taxAuthority;
    }

    /**
     * @param TaxAuthorityEntity $taxAuthority
     * @return $this
     */
    public function setTaxAuthority(TaxAuthorityEntity $taxAuthority)
    {
        $this->taxAuthority = $taxAuthority;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param string $rate
     * @return $this
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCompound()
    {
        return $this->isCompound;
    }

    /**
     * @param boolean $isCompound
     * @return $this
     */
    public function setIsCompound($isCompound)
    {
        $this->isCompound = $isCompound;
        return $this;
    }
}
