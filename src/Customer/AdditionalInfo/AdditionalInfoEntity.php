<?php

namespace Smart\Sage50\Customer\AdditionalInfo;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tcusudf")
 */
class AdditionalInfoEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lCusId", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $customerId = 0;

    /**
     * @ORM\OneToOne(targetEntity="\Smart\Sage50\Customer\CustomerEntity", inversedBy="additionalInfo")
     * @ORM\JoinColumn(name="lCusId", referencedColumnName="lId")
     * @var CustomerEntity
     */
    private $customer;

    /**
     * @ORM\Column(name="dtASDate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $modificationDate;

    /**
     * @ORM\Column(name="tmASTime", type="datetime", nullable=true)
     * @var DateTime
     */
    private $modificationTime;

    /**
     * @ORM\Column(name="sASUserId", type="string", length=14, nullable=true)
     * @var string
     */
    private $createdByUsername;

    /**
     * @ORM\Column(name="sASOrgId", type="string", length=6, nullable=true)
     * @var string
     */
    private $createdByOrg;

    /**
     * @ORM\Column(name="sUsrDfnd1", type="string", length=50, nullable=true)
     * @var string
     */
    private $field1;

    /**
     * @ORM\Column(name="sUsrDfnd2", type="string", length=50, nullable=true)
     * @var string
     */
    private $field2;

    /**
     * @ORM\Column(name="sUsrDfnd3", type="string", length=50, nullable=true)
     * @var string
     */
    private $field3;

    /**
     * @ORM\Column(name="sUsrDfnd4", type="string", length=50, nullable=true)
     * @var string
     */
    private $field4;

    /**
     * @ORM\Column(name="sUsrDfnd5", type="string", length=50, nullable=true)
     * @var string
     */
    private $field5;

    /**
     * @ORM\Column(name="bPopInfo1", type="boolean", nullable=true)
     * @var bool
     */
    private $showField1;

    /**
     * @ORM\Column(name="bPopInfo2", type="boolean", nullable=true)
     * @var bool
     */
    private $showField2;

    /**
     * @ORM\Column(name="bPopInfo3", type="boolean", nullable=true)
     * @var bool
     */
    private $showField3;

    /**
     * @ORM\Column(name="bPopInfo4", type="boolean", nullable=true)
     * @var bool
     */
    private $showField4;

    /**
     * @ORM\Column(name="bPopInfo5", type="boolean", nullable=true)
     * @var bool
     */
    private $showField5;

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return CustomerEntity
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param $modificationDate
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @return DateTime
     */
    public function getModificationTime()
    {
        return $this->modificationTime;
    }

    /**
     * @param $modificationTime
     */
    public function setModificationTime($modificationTime)
    {
        $this->modificationTime = $modificationTime;
    }

    /**
     * @return string
     */
    public function getCreatedByUsername()
    {
        return $this->createdByUsername;
    }

    /**
     * @param $createdByUsername
     */
    public function setCreatedByUsername($createdByUsername)
    {
        $this->createdByUsername = $createdByUsername;
    }

    /**
     * @return string
     */
    public function getCreatedByOrg()
    {
        return $this->createdByOrg;
    }

    /**
     * @param $createdByOrg
     */
    public function setCreatedByOrg($createdByOrg)
    {
        $this->createdByOrg = $createdByOrg;
    }

    /**
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * @param $field1
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;
    }

    /**
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }

    /**
     * @param $field2
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;
    }

    /**
     * @return string
     */
    public function getField3()
    {
        return $this->field3;
    }

    /**
     * @param $field3
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;
    }

    /**
     * @return string
     */
    public function getField4()
    {
        return $this->field4;
    }

    /**
     * @param $field4
     */
    public function setField4($field4)
    {
        $this->field4 = $field4;
    }

    /**
     * @return string
     */
    public function getField5()
    {
        return $this->field5;
    }

    /**
     * @param $field5
     */
    public function setField5($field5)
    {
        $this->field5 = $field5;
    }

    /**
     * @return bool
     */
    public function isShowField1()
    {
        return $this->showField1;
    }

    /**
     * @param $showField1
     */
    public function setShowField1($showField1)
    {
        $this->showField1 = $showField1;
    }

    /**
     * @return bool
     */
    public function isShowField2()
    {
        return $this->showField2;
    }

    /**
     * @param $showField2
     */
    public function setShowField2($showField2)
    {
        $this->showField2 = $showField2;
    }

    /**
     * @return bool
     */
    public function isShowField3()
    {
        return $this->showField3;
    }

    /**
     * @param $showField3
     */
    public function setShowField3($showField3)
    {
        $this->showField3 = $showField3;
    }

    /**
     * @return bool
     */
    public function isShowField4()
    {
        return $this->showField4;
    }

    /**
     * @param $showField4
     */
    public function setShowField4($showField4)
    {
        $this->showField4 = $showField4;
    }

    /**
     * @return bool
     */
    public function isShowField5()
    {
        return $this->showField5;
    }

    /**
     * @param $showField5
     */
    public function setShowField5($showField5)
    {
        $this->showField5 = $showField5;
    }
}
