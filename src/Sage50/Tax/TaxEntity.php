<?php
namespace Sinergi\Sage50\Tax;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ttaxauth", uniqueConstraints={@ORM\UniqueConstraint(name="KEY_1", columns={"sName", "lFirstRev"})})
 */
class TaxEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $id = 0;

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
    private $createdByUsername = 'sysadmin';

    /**
     * @ORM\Column(name="sASOrgId", type="string", length=6, nullable=true)
     * @var string
     */
    private $createdByOrg = 'winsim';

    /**
     * @ORM\Column(name="sName", type="string", length=20, nullable=true)
     * @var string
     */
    private $nameEnglish;

    /**
     * @ORM\Column(name="sTaxId", type="string", length=20, nullable=true)
     * @var string
     */
    private $companyTaxId;

    /**
     * @ORM\Column(name="lAcSalTax", type="integer", nullable=true)
     * @var int
     */
    private $collectedTaxAccount;

    /**
     * @ORM\Column(name="bTaxable", type="boolean", nullable=true)
     * @var bool
     */
    private $isTaxable;

    /**
     * @ORM\Column(name="bPTxExmpt", type="boolean", nullable=true)
     * @var bool
     */
    private $isExempt;

    /**
     * @ORM\Column(name="bPTxTrack", type="boolean", nullable=true)
     * @var bool
     */
    private $isTrackable;

    /**
     * @ORM\Column(name="lAcPurTax", type="integer", nullable=true)
     * @var int
     */
    private $paidTaxAccount;

    /**
     * @ORM\Column(name="wTaxRpt", type="smallint", nullable=true)
     * @var int
     */
    private $isPaidTaxReported;

    /**
     * @ORM\Column(name="nACTaxLen", type="smallint", nullable=true)
     * @var int
     */
    private $taxReportMonths;

    /**
     * @ORM\Id
     * @ORM\Column(name="lFirstRev", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $firstRevisionId = 0;

    /**
     * @ORM\Column(name="lLastRev", type="integer", nullable=true)
     * @var int
     */
    private $lastRevisionId;

    /**
     * @ORM\Column(name="lDpSalTax", type="integer", nullable=true)
     * @var int
     */
    private $collectedTaxDepartementId;

    /**
     * @ORM\Column(name="lDpPurTax", type="integer", nullable=true)
     * @var int
     */
    private $paidTaxDepartementId;

    /**
     * @ORM\Column(name="sNameF", type="string", length=20, nullable=true)
     * @var string
     */
    private $nameFrench;

    public function __construct()
    {
        $this->setModificationDate(new DateTime(date('Y-m-d 00:00:00')));
        $this->setModificationTime(new DateTime(date('1899-12-30 H:i:s')));
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
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param DateTime $modificationDate
     * @return $this
     */
    public function setModificationDate(DateTime $modificationDate)
    {
        $this->modificationDate = $modificationDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationTime()
    {
        return $this->modificationTime;
    }

    /**
     * @param DateTime $modificationTime
     * @return $this
     */
    public function setModificationTime(DateTime $modificationTime)
    {
        $this->modificationTime = $modificationTime;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModificationDatetime()
    {
        return new DateTime($this->modificationDate->format('Y-m-d') . ' ' . $this->modificationTime->format('H:i:s'));
    }

    /**
     * @return string
     */
    public function getCreatedByUsername()
    {
        return $this->createdByUsername;
    }

    /**
     * @param string $createdByUsername
     * @return $this
     */
    public function setCreatedByUsername($createdByUsername)
    {
        $this->createdByUsername = $createdByUsername;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedByOrg()
    {
        return $this->createdByOrg;
    }

    /**
     * @param string $createdByOrg
     * @return $this
     */
    public function setCreatedByOrg($createdByOrg)
    {
        $this->createdByOrg = $createdByOrg;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameEnglish()
    {
        return $this->nameEnglish;
    }

    /**
     * @param string $nameEnglish
     * @return $this
     */
    public function setNameEnglish($nameEnglish)
    {
        $this->nameEnglish = $nameEnglish;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyTaxId()
    {
        return $this->companyTaxId;
    }

    /**
     * @param string $companyTaxId
     * @return $this
     */
    public function setCompanyTaxId($companyTaxId)
    {
        $this->companyTaxId = $companyTaxId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCollectedTaxAccount()
    {
        return $this->collectedTaxAccount;
    }

    /**
     * @param int $collectedTaxAccount
     * @return $this
     */
    public function setCollectedTaxAccount($collectedTaxAccount)
    {
        $this->collectedTaxAccount = $collectedTaxAccount;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTaxable()
    {
        return $this->isTaxable;
    }

    /**
     * @param boolean $isTaxable
     * @return $this
     */
    public function setIsTaxable($isTaxable)
    {
        $this->isTaxable = $isTaxable;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isExempt()
    {
        return $this->isExempt;
    }

    /**
     * @param boolean $isExempt
     * @return $this
     */
    public function setIsExempt($isExempt)
    {
        $this->isExempt = $isExempt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTrackable()
    {
        return $this->isTrackable;
    }

    /**
     * @param boolean $isTrackable
     * @return $this
     */
    public function setIsTrackable($isTrackable)
    {
        $this->isTrackable = $isTrackable;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaidTaxAccount()
    {
        return $this->paidTaxAccount;
    }

    /**
     * @param int $paidTaxAccount
     * @return $this
     */
    public function setPaidTaxAccount($paidTaxAccount)
    {
        $this->paidTaxAccount = $paidTaxAccount;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsPaidTaxReported()
    {
        return $this->isPaidTaxReported;
    }

    /**
     * @param int $isPaidTaxReported
     * @return $this
     */
    public function setIsPaidTaxReported($isPaidTaxReported)
    {
        $this->isPaidTaxReported = $isPaidTaxReported;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxReportMonths()
    {
        return $this->taxReportMonths;
    }

    /**
     * @param int $taxReportMonths
     * @return $this
     */
    public function setTaxReportMonths($taxReportMonths)
    {
        $this->taxReportMonths = $taxReportMonths;
        return $this;
    }

    /**
     * @return int
     */
    public function getFirstRevisionId()
    {
        return $this->firstRevisionId;
    }

    /**
     * @param int $firstRevisionId
     * @return $this
     */
    public function setFirstRevisionId($firstRevisionId)
    {
        $this->firstRevisionId = $firstRevisionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastRevisionId()
    {
        return $this->lastRevisionId;
    }

    /**
     * @param int $lastRevisionId
     * @return $this
     */
    public function setLastRevisionId($lastRevisionId)
    {
        $this->lastRevisionId = $lastRevisionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCollectedTaxDepartementId()
    {
        return $this->collectedTaxDepartementId;
    }

    /**
     * @param int $collectedTaxDepartementId
     * @return $this
     */
    public function setCollectedTaxDepartementId($collectedTaxDepartementId)
    {
        $this->collectedTaxDepartementId = $collectedTaxDepartementId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaidTaxDepartementId()
    {
        return $this->paidTaxDepartementId;
    }

    /**
     * @param int $paidTaxDepartementId
     * @return $this
     */
    public function setPaidTaxDepartementId($paidTaxDepartementId)
    {
        $this->paidTaxDepartementId = $paidTaxDepartementId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameFrench()
    {
        return $this->nameFrench;
    }

    /**
     * @param string $nameFrench
     * @return $this
     */
    public function setNameFrench($nameFrench)
    {
        $this->nameFrench = $nameFrench;
        return $this;
    }
}
