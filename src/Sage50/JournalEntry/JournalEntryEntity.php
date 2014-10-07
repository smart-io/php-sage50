<?php
namespace Sinergi\Sage50\JournalEntry;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tjourent")
 */
class JournalEntryEntity
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
     * @ORM\Column(name="dtJourDate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $journalDate;

    /**
     * @ORM\Column(name="nModule", type="smallint", nullable=true)
     * @var int
     */
    private $moduleTag;

    /**
     * @ORM\Column(name="nType", type="smallint", nullable=true)
     * @var int
     */
    private $journalEntryType;

    /**
     * @ORM\Column(name="sSource", type="string", length=20, nullable=true)
     * @var string
     */
    private $sourceDescription;

    /**
     * @ORM\Column(name="sComment", type="string", length=75, nullable=true)
     * @var string
     */
    private $commentDescription;

    /**
     * @ORM\Column(name="lCurrncyId", type="integer", nullable=true)
     * @var int
     */
    private $currencyId;

    /**
     * @ORM\Column(name="dExchRate", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $exchangeRate;

    /**
     * @ORM\Column(name="lRecId", type="integer", nullable=true)
     * @var int
     */
    private $recordId;

    /**
     * @ORM\Column(name="nPymtClass", type="smallint", nullable=true)
     * @var int
     */
    private $paymentType;

    /**
     * @ORM\Column(name="sComment2", type="string", length=75, nullable=true)
     * @var string
     */
    private $additionalTransactionComment;

    /**
     * @ORM\Column(name="dtCmt2Date", type="datetime", nullable=true)
     * @var DateTime
     */
    private $additionalTransactionDate;

    /**
     * @ORM\Column(name="bExported", type="boolean", nullable=true)
     * @var bool
     */
    private $isExported;

    /**
     * @ORM\Id
     * @ORM\Column(name="lCompId", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $companyId = 0;

    /**
     * @ORM\Column(name="bAcctEntry", type="boolean", nullable=true)
     * @var bool
     */
    private $isPostedByAccountantEdition;

    /**
     * @ORM\Column(name="bAEImport", type="boolean", nullable=true)
     * @var bool
     */
    private $isImportedFromAccountantEdition;

    /**
     * @ORM\Column(name="bAftYEnd", type="boolean", nullable=true)
     * @var bool
     */
    private $isPostedAfterYearEnd;

    /**
     * @ORM\Column(name="bB4YrStart", type="boolean", nullable=true)
     * @var bool
     */
    private $isPostedBeforeYearStart;

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
     * @return DateTime
     */
    public function getJournalDate()
    {
        return $this->journalDate;
    }

    /**
     * @param DateTime $journalDate
     * @return $this
     */
    public function setJournalDate(DateTime $journalDate)
    {
        $this->journalDate = $journalDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getModuleTag()
    {
        return $this->moduleTag;
    }

    /**
     * @param int $moduleTag
     * @return $this
     */
    public function setModuleTag($moduleTag)
    {
        $this->moduleTag = $moduleTag;
        return $this;
    }

    /**
     * @return int
     */
    public function getJournalEntryType()
    {
        return $this->journalEntryType;
    }

    /**
     * @param int $journalEntryType
     * @return $this
     */
    public function setJournalEntryType($journalEntryType)
    {
        $this->journalEntryType = $journalEntryType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceDescription()
    {
        return $this->sourceDescription;
    }

    /**
     * @param string $sourceDescription
     * @return $this
     */
    public function setSourceDescription($sourceDescription)
    {
        $this->sourceDescription = $sourceDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDescription()
    {
        return $this->commentDescription;
    }

    /**
     * @param string $commentDescription
     * @return $this
     */
    public function setCommentDescription($commentDescription)
    {
        $this->commentDescription = $commentDescription;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param int $currencyId
     * @return $this
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return float
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * @param float $exchangeRate
     * @return $this
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @param int $recordId
     * @return $this
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param int $paymentType
     * @return $this
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalTransactionComment()
    {
        return $this->additionalTransactionComment;
    }

    /**
     * @param string $additionalTransactionComment
     * @return $this
     */
    public function setAdditionalTransactionComment($additionalTransactionComment)
    {
        $this->additionalTransactionComment = $additionalTransactionComment;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getAdditionalTransactionDate()
    {
        return $this->additionalTransactionDate;
    }

    /**
     * @param DateTime $additionalTransactionDate
     * @return $this
     */
    public function setAdditionalTransactionDate(DateTime $additionalTransactionDate)
    {
        $this->additionalTransactionDate = $additionalTransactionDate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isExported()
    {
        return $this->isExported;
    }

    /**
     * @param boolean $isExported
     * @return $this
     */
    public function setIsExported($isExported)
    {
        $this->isExported = $isExported;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     * @return $this
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPostedByAccountantEdition()
    {
        return $this->isPostedByAccountantEdition;
    }

    /**
     * @param boolean $isPostedByAccountantEdition
     * @return $this
     */
    public function setIsPostedByAccountantEdition($isPostedByAccountantEdition)
    {
        $this->isPostedByAccountantEdition = $isPostedByAccountantEdition;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isImportedFromAccountantEdition()
    {
        return $this->isImportedFromAccountantEdition;
    }

    /**
     * @param boolean $isImportedFromAccountantEdition
     * @return $this
     */
    public function setIsImportedFromAccountantEdition($isImportedFromAccountantEdition)
    {
        $this->isImportedFromAccountantEdition = $isImportedFromAccountantEdition;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPostedAfterYearEnd()
    {
        return $this->isPostedAfterYearEnd;
    }

    /**
     * @param boolean $isPostedAfterYearEnd
     * @return $this
     */
    public function setIsPostedAfterYearEnd($isPostedAfterYearEnd)
    {
        $this->isPostedAfterYearEnd = $isPostedAfterYearEnd;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPostedBeforeYearStart()
    {
        return $this->isPostedBeforeYearStart;
    }

    /**
     * @param boolean $isPostedBeforeYearStart
     * @return $this
     */
    public function setIsPostedBeforeYearStart($isPostedBeforeYearStart)
    {
        $this->isPostedBeforeYearStart = $isPostedBeforeYearStart;
        return $this;
    }
}
