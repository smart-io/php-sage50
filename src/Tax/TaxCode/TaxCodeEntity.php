<?php

namespace Smart\Sage50\Tax\TaxCode;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ttaxcode", uniqueConstraints={@ORM\UniqueConstraint(name="KEY_1", columns={"sCode", "lFirstRev"})})
 */
class TaxCodeEntity
{
    const USE_FOR_ALL_JOURNAL = 1;
    const USE_FOR_PURCHASE_JOURNAL = 2;
    const USE_FOR_SALE_JOURNAL = 4;

    /**
     * @ORM\Id
     * @ORM\Column(name="lId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $taxId = 0;

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
     * @ORM\Column(name="sCode", type="string", length=2, nullable=true)
     * @var string
     */
    private $code;

    /**
     * @ORM\Column(name="sDesc", type="string", length=50, nullable=true)
     * @var string
     */
    private $descriptionEnglish;

    /**
     * @ORM\Column(name="bUsed", type="boolean", nullable=true)
     * @var bool
     */
    private $isUsed;

    /**
     * @ORM\Column(name="bHidden", type="boolean", nullable=true)
     * @var bool
     */
    private $isNonStandard;

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
     * @ORM\Column(name="lUseInFlag", type="integer", nullable=true)
     * @var int
     */
    private $useForJournal = self::USE_FOR_ALL_JOURNAL;

    /**
     * @ORM\Column(name="nLineNum", type="smallint", nullable=true)
     * @var int
     */
    private $lineNumber;

    /**
     * @ORM\Column(name="sDescF", type="string", length=50, nullable=true)
     * @var string
     */
    private $descriptionFrench;

    public function __construct()
    {
        $this->setModificationDate(new DateTime(date('Y-m-d 00:00:00')));
        $this->setModificationTime(new DateTime(date('1899-12-30 H:i:s')));
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionEnglish()
    {
        return $this->descriptionEnglish;
    }

    /**
     * @param string $descriptionEnglish
     * @return $this
     */
    public function setDescriptionEnglish($descriptionEnglish)
    {
        $this->descriptionEnglish = $descriptionEnglish;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUsed()
    {
        return $this->isUsed;
    }

    /**
     * @param boolean $isUsed
     * @return $this
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isNonStandard()
    {
        return $this->isNonStandard;
    }

    /**
     * @param boolean $isNonStandard
     * @return $this
     */
    public function setIsNonStandard($isNonStandard)
    {
        $this->isNonStandard = $isNonStandard;
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
    public function getUseForJournal()
    {
        return $this->useForJournal;
    }

    /**
     * @param int $useForJournal
     * @return $this
     */
    public function setUseForJournal($useForJournal)
    {
        $this->useForJournal = $useForJournal;
        return $this;
    }

    /**
     * @return int
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @param int $lineNumber
     * @return $this
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionFrench()
    {
        return $this->descriptionFrench;
    }

    /**
     * @param string $descriptionFrench
     * @return $this
     */
    public function setDescriptionFrench($descriptionFrench)
    {
        $this->descriptionFrench = $descriptionFrench;
        return $this;
    }
}
