<?php

namespace Smart\Sage50\Invoice;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\Invoice\InvoiceLookup\InvoiceLookupEntity;
use Smart\Sage50\Invoice\Item\ItemEntity;

/**
 * @ORM\Entity(repositoryClass="Smart\Sage50\Invoice\InvoiceRepository")
 * @ORM\Table(name="titrec", indexes={@ORM\Index(name="KEY_1", columns={"lVenCusId"}), @ORM\Index(name="KEY_2", columns={"dtJournal"})})
 */
class InvoiceEntity
{
	const JOURNAL_TYPE_PURCHASE_ORDERS_AND_QUOTES = 7;
	const JOURNAL_TYPE_SALES_ORDERS_AND_QUOTES = 8;
	const JOURNAL_TYPE_BILL_OF_MATERIALS_AND_ITEM_ASSEMBLY = 10;
	const JOURNAL_TYPE_PAYMENTS = 12;
	const JOURNAL_TYPE_ADJUSTMENTS = 14;

	const ORDER_TYPE_REGULAR = 0;
	const ORDER_TYPE_WEB_STORE = 1;

	/**
	 * @ORM\Id
	 * @ORM\Column(name="lId", type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	private $id = 0;

	/**
	 * @ORM\OneToOne(targetEntity="\Smart\Sage50\Invoice\InvoiceLookup\InvoiceLookupEntity", mappedBy="invoice")
	 * @var InvoiceLookupEntity
	 **/
	private $invoiceLookup;

	/**
	 * @ORM\OneToMany(targetEntity="\Smart\Sage50\Invoice\Item\ItemEntity", mappedBy="invoice")
	 * @var ItemEntity[]
	 **/
	private $items;

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
	 * @ORM\Column(name="lVenCusId", type="integer", nullable=true)
	 * @var int
	 */
	private $customerId;

	/**
	 * @ORM\Column(name="lJourId", type="integer", nullable=true)
	 * @var int
	 */
	private $journalId;

	/**
	 * @ORM\Column(name="nTsfIn", type="smallint", nullable=true)
	 * @var int
	 */
	private $numberOfTransferringInLine;

	/**
	 * @ORM\Column(name="nJournal", type="smallint", nullable=true)
	 * @var int
	 */
	private $journalType = self::JOURNAL_TYPE_PURCHASE_ORDERS_AND_QUOTES;

	/**
	 * @ORM\Column(name="dtJournal", type="datetime", nullable=true)
	 * @var DateTime
	 */
	private $journalEntryDate;

	/**
	 * @ORM\Column(name="dtUsing", type="datetime", nullable=true)
	 * @var DateTime
	 */
	private $sessionDate;

	/**
	 * @ORM\Column(name="sComment", type="string", length=100, nullable=true)
	 * @var string
	 */
	private $comment = '';

	/**
	 * @ORM\Column(name="sSource1", type="string", length=20, nullable=true)
	 * @var string
	 */
	private $sourceCode1;

	/**
	 * @ORM\Column(name="sSource2", type="string", length=20, nullable=true)
	 * @var string
	 */
	private $sourceCode2;

	/**
	 * @ORM\Column(name="sRef", type="string", length=20, nullable=true)
	 * @var string
	 */
	private $referenceNumber;

	/**
	 * @ORM\Column(name="dFreight", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $freightAmount;

	/**
	 * @ORM\Column(name="dInvAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $totalAmount;

	/**
	 * @ORM\Column(name="fDiscPer", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $discountPercentage = 0.00;

	/**
	 * @ORM\Column(name="nDiscDay", type="smallint", nullable=true)
	 * @var int
	 */
	private $discountDay = 0;

	/**
	 * @ORM\Column(name="nNetDay", type="smallint", nullable=true)
	 * @var int
	 */
	private $discountNetDay = 0;

	/**
	 * @ORM\Column(name="dDiscAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $discountAmount = 0;

	/**
	 * @ORM\Column(name="bCashTrans", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isCashTransaction = false;

	/**
	 * @ORM\Column(name="bCashAccnt", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isCashAccount = false;

	/**
	 * @ORM\Column(name="b40Data", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isLegacyData = false;

	/**
	 * @ORM\Column(name="bReversal", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isReversal = false;

	/**
	 * @ORM\Column(name="bReversed", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isReversed = false;

	/**
	 * @ORM\Column(name="bFromPO", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isFromSalesOrder = false;

	/**
	 * @ORM\Column(name="bPdByCash", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPaidByCash = false;

	/**
	 * @ORM\Column(name="bPdbyCC", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPaidByCreditCard = false;

	/**
	 * @ORM\Column(name="bDiscBfTax", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isDiscountBeforeTaxes = false;

	/**
	 * @ORM\Column(name="bFromImp", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isImportedEntry = false;

	/**
	 * @ORM\Column(name="bUseMCurr", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isMultiCurrecy = false;

	/**
	 * @ORM\Column(name="bLUCleared", type="boolean", nullable=true)
	 * @var bool
	 */
	private $lookupIsCleared = false;

	/**
	 * @ORM\Column(name="bStoreDuty", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isStoringDuty;

	/**
	 * @ORM\Column(name="lCurIdUsed", type="integer", nullable=true)
	 * @var int
	 */
	private $currencyId = 0;

	/**
	 * @ORM\Column(name="dExchRate", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $exchangeRate = 0;

	/**
	 * @ORM\Column(name="sSource3", type="string", length=20, nullable=true)
	 * @var string
	 */
	private $sourceCode3;

	/**
	 * @ORM\Column(name="bPrinted", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPrinted = false;

	/**
	 * @ORM\Column(name="bEmailed", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isEmailed = false;

	/**
	 * @ORM\Column(name="lChqId", type="integer", nullable=true)
	 * @var int
	 */
	private $chequeId = 0;

	/**
	 * @ORM\Column(name="sUser", type="string", length=20, nullable=true)
	 * @var string
	 */
	private $enteredByUsername = 'sysadmin';

	/**
	 * @ORM\Column(name="bChallan", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isNotUserBySage50;

	/**
	 * @ORM\Column(name="bPaidByWeb", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPaidByWebStore;

	/**
	 * @ORM\Column(name="nOrdType", type="smallint", nullable=true)
	 * @var int
	 */
	private $orderType = self::ORDER_TYPE_REGULAR;

	/**
	 * @ORM\Column(name="bPrePaid", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPrePaid = false;

	/**
	 * @ORM\Column(name="lOrigPPId", type="integer", nullable=true)
	 * @var int
	 */
	private $originalPrepaymentId;

	/**
	 * @ORM\Column(name="lPPId", type="integer", nullable=true)
	 * @var int
	 */
	private $prepaymentId;

	/**
	 * @ORM\Column(name="dPrePAmt", type="float", precision=10, scale=0, nullable=true)
	 * @var float
	 */
	private $prepaymentAmount;

	/**
	 * @ORM\Column(name="lSoldBy", type="integer", nullable=true)
	 * @var int
	 */
	private $soldById = 0;

	/**
	 * @ORM\Column(name="szSoldBy", type="string", length=52, nullable=true)
	 * @var string
	 */
	private $soldByName = '';

	/**
	 * @ORM\Column(name="bDSProc", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isDepositSlipCleared = 0;

	/**
	 * @ORM\Column(name="lInvLocId", type="integer", nullable=true)
	 * @var int
	 */
	private $inventoryLocationId = 1;

	/**
	 * @ORM\Column(name="bTrfLoc", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isTransferBetweenLocations = false;

	/**
	 * @ORM\Column(name="bRmBPLst", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isRemovedFromBatchList = false;

	/**
	 * @ORM\Column(name="bPSPrintd", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPrintedAsPackingSlip = false;

	/**
	 * @ORM\Column(name="bPSRmBPLst", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isRemovedFromPackingSlipBatchPrintingList = false;

	/**
	 * @ORM\Column(name="lCCTransId", type="integer", nullable=true)
	 * @var int
	 */
	private $creditCardTransactionId = 0;

	/**
	 * @ORM\Column(name="bPdByDP", type="boolean", nullable=true)
	 * @var bool
	 */
	private $isPaidByDirectPayment = false;

	public function __construct()
	{
		$this->setModificationDate(new DateTime(date('Y-m-d 00:00:00')));
		$this->setModificationTime(new DateTime(date('1899-12-30 H:i:s')));
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return InvoiceLookupEntity
	 */
	public function getInvoiceLookup()
	{
		return $this->invoiceLookup;
	}

	/**
	 * @param InvoiceLookupEntity $invoiceLookup
	 */
	public function setInvoiceLookup(InvoiceLookupEntity $invoiceLookup)
	{
		$this->invoiceLookup = $invoiceLookup;
	}

	/**
	 * @return ItemEntity[]
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param ItemEntity[] $items
	 */
	public function setItems($items)
	{
		$this->items = $items;
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
	 * @param DateTime $modificationTime
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
	 * @param string $createdByUsername
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
	 * @param string $createdByOrg
	 */
	public function setCreatedByOrg($createdByOrg)
	{
		$this->createdByOrg = $createdByOrg;
	}

	/**
	 * @return int
	 */
	public function getCustomerId()
	{
		return $this->customerId;
	}

	/**
	 * @param int $customerId
	 */
	public function setCustomerId($customerId)
	{
		$this->customerId = $customerId;
	}

	/**
	 * @return int
	 */
	public function getJournalId()
	{
		return $this->journalId;
	}

	/**
	 * @param int $journalId
	 */
	public function setJournalId($journalId)
	{
		$this->journalId = $journalId;
	}

	/**
	 * @return int
	 */
	public function getNumberOfTransferringInLine()
	{
		return $this->numberOfTransferringInLine;
	}

	/**
	 * @param int $numberOfTransferringInLine
	 */
	public function setNumberOfTransferringInLine($numberOfTransferringInLine)
	{
		$this->numberOfTransferringInLine = $numberOfTransferringInLine;
	}

	/**
	 * @return int
	 */
	public function getJournalType()
	{
		return $this->journalType;
	}

	/**
	 * @param int $journalType
	 */
	public function setJournalType($journalType)
	{
		$this->journalType = $journalType;
	}

	/**
	 * @return DateTime
	 */
	public function getJournalEntryDate()
	{
		return $this->journalEntryDate;
	}

	/**
	 * @param DateTime $journalEntryDate
	 */
	public function setJournalEntryDate($journalEntryDate)
	{
		$this->journalEntryDate = $journalEntryDate;
	}

	/**
	 * @return DateTime
	 */
	public function getSessionDate()
	{
		return $this->sessionDate;
	}

	/**
	 * @param DateTime $sessionDate
	 */
	public function setSessionDate($sessionDate)
	{
		$this->sessionDate = $sessionDate;
	}

	/**
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * @param string $comment
	 */
	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	/**
	 * @return string
	 */
	public function getSourceCode1()
	{
		return $this->sourceCode1;
	}

	/**
	 * @param string $sourceCode1
	 */
	public function setSourceCode1($sourceCode1)
	{
		$this->sourceCode1 = $sourceCode1;
	}

	/**
	 * @return string
	 */
	public function getSourceCode2()
	{
		return $this->sourceCode2;
	}

	/**
	 * @param string $sourceCode2
	 */
	public function setSourceCode2($sourceCode2)
	{
		$this->sourceCode2 = $sourceCode2;
	}

	/**
	 * @return string
	 */
	public function getReferenceNumber()
	{
		return $this->referenceNumber;
	}

	/**
	 * @param string $referenceNumber
	 */
	public function setReferenceNumber($referenceNumber)
	{
		$this->referenceNumber = $referenceNumber;
	}

	/**
	 * @return float
	 */
	public function getFreightAmount()
	{
		return $this->freightAmount;
	}

	/**
	 * @param float $freightAmount
	 */
	public function setFreightAmount($freightAmount)
	{
		$this->freightAmount = $freightAmount;
	}

	/**
	 * @return float
	 */
	public function getTotalAmount()
	{
		return $this->totalAmount;
	}

	/**
	 * @param float $totalAmount
	 */
	public function setTotalAmount($totalAmount)
	{
		$this->totalAmount = $totalAmount;
	}

	/**
	 * @return float
	 */
	public function getDiscountPercentage()
	{
		return $this->discountPercentage;
	}

	/**
	 * @param float $discountPercentage
	 */
	public function setDiscountPercentage($discountPercentage)
	{
		$this->discountPercentage = $discountPercentage;
	}

	/**
	 * @return int
	 */
	public function getDiscountDay()
	{
		return $this->discountDay;
	}

	/**
	 * @param int $discountDay
	 */
	public function setDiscountDay($discountDay)
	{
		$this->discountDay = $discountDay;
	}

	/**
	 * @return int
	 */
	public function getDiscountNetDay()
	{
		return $this->discountNetDay;
	}

	/**
	 * @param int $discountNetDay
	 */
	public function setDiscountNetDay($discountNetDay)
	{
		$this->discountNetDay = $discountNetDay;
	}

	/**
	 * @return float
	 */
	public function getDiscountAmount()
	{
		return $this->discountAmount;
	}

	/**
	 * @param float $discountAmount
	 */
	public function setDiscountAmount($discountAmount)
	{
		$this->discountAmount = $discountAmount;
	}

	/**
	 * @return boolean
	 */
	public function isCashTransaction()
	{
		return $this->isCashTransaction;
	}

	/**
	 * @param boolean $isCashTransaction
	 */
	public function setIsCashTransaction($isCashTransaction)
	{
		$this->isCashTransaction = $isCashTransaction;
	}

	/**
	 * @return boolean
	 */
	public function isCashAccount()
	{
		return $this->isCashAccount;
	}

	/**
	 * @param boolean $isCashAccount
	 */
	public function setIsCashAccount($isCashAccount)
	{
		$this->isCashAccount = $isCashAccount;
	}

	/**
	 * @return boolean
	 */
	public function isLegacyData()
	{
		return $this->isLegacyData;
	}

	/**
	 * @param boolean $isLegacyData
	 */
	public function setIsLegacyData($isLegacyData)
	{
		$this->isLegacyData = $isLegacyData;
	}

	/**
	 * @return boolean
	 */
	public function isReversal()
	{
		return $this->isReversal;
	}

	/**
	 * @param boolean $isReversal
	 */
	public function setIsReversal($isReversal)
	{
		$this->isReversal = $isReversal;
	}

	/**
	 * @return boolean
	 */
	public function isReversed()
	{
		return $this->isReversed;
	}

	/**
	 * @param boolean $isReversed
	 */
	public function setIsReversed($isReversed)
	{
		$this->isReversed = $isReversed;
	}

	/**
	 * @return boolean
	 */
	public function isFromSalesOrder()
	{
		return $this->isFromSalesOrder;
	}

	/**
	 * @param boolean $isFromSalesOrder
	 */
	public function setIsFromSalesOrder($isFromSalesOrder)
	{
		$this->isFromSalesOrder = $isFromSalesOrder;
	}

	/**
	 * @return boolean
	 */
	public function isPaidByCash()
	{
		return $this->isPaidByCash;
	}

	/**
	 * @param boolean $isPaidByCash
	 */
	public function setIsPaidByCash($isPaidByCash)
	{
		$this->isPaidByCash = $isPaidByCash;
	}

	/**
	 * @return boolean
	 */
	public function isPaidByCreditCard()
	{
		return $this->isPaidByCreditCard;
	}

	/**
	 * @param boolean $isPaidByCreditCard
	 */
	public function setIsPaidByCreditCard($isPaidByCreditCard)
	{
		$this->isPaidByCreditCard = $isPaidByCreditCard;
	}

	/**
	 * @return boolean
	 */
	public function isDiscountBeforeTaxes()
	{
		return $this->isDiscountBeforeTaxes;
	}

	/**
	 * @param boolean $isDiscountBeforeTaxes
	 */
	public function setIsDiscountBeforeTaxes($isDiscountBeforeTaxes)
	{
		$this->isDiscountBeforeTaxes = $isDiscountBeforeTaxes;
	}

	/**
	 * @return boolean
	 */
	public function isImportedEntry()
	{
		return $this->isImportedEntry;
	}

	/**
	 * @param boolean $isImportedEntry
	 */
	public function setIsImportedEntry($isImportedEntry)
	{
		$this->isImportedEntry = $isImportedEntry;
	}

	/**
	 * @return boolean
	 */
	public function isMultiCurrecy()
	{
		return $this->isMultiCurrecy;
	}

	/**
	 * @param boolean $isMultiCurrecy
	 */
	public function setIsMultiCurrecy($isMultiCurrecy)
	{
		$this->isMultiCurrecy = $isMultiCurrecy;
	}

	/**
	 * @return boolean
	 */
	public function isLookupIsCleared()
	{
		return $this->lookupIsCleared;
	}

	/**
	 * @param boolean $lookupIsCleared
	 */
	public function setLookupIsCleared($lookupIsCleared)
	{
		$this->lookupIsCleared = $lookupIsCleared;
	}

	/**
	 * @return boolean
	 */
	public function isStoringDuty()
	{
		return $this->isStoringDuty;
	}

	/**
	 * @param boolean $isStoringDuty
	 */
	public function setIsStoringDuty($isStoringDuty)
	{
		$this->isStoringDuty = $isStoringDuty;
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
	 */
	public function setCurrencyId($currencyId)
	{
		$this->currencyId = $currencyId;
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
	 */
	public function setExchangeRate($exchangeRate)
	{
		$this->exchangeRate = $exchangeRate;
	}

	/**
	 * @return string
	 */
	public function getSourceCode3()
	{
		return $this->sourceCode3;
	}

	/**
	 * @param string $sourceCode3
	 */
	public function setSourceCode3($sourceCode3)
	{
		$this->sourceCode3 = $sourceCode3;
	}

	/**
	 * @return boolean
	 */
	public function isPrinted()
	{
		return $this->isPrinted;
	}

	/**
	 * @param boolean $isPrinted
	 */
	public function setIsPrinted($isPrinted)
	{
		$this->isPrinted = $isPrinted;
	}

	/**
	 * @return boolean
	 */
	public function isEmailed()
	{
		return $this->isEmailed;
	}

	/**
	 * @param boolean $isEmailed
	 */
	public function setIsEmailed($isEmailed)
	{
		$this->isEmailed = $isEmailed;
	}

	/**
	 * @return int
	 */
	public function getChequeId()
	{
		return $this->chequeId;
	}

	/**
	 * @param int $chequeId
	 */
	public function setChequeId($chequeId)
	{
		$this->chequeId = $chequeId;
	}

	/**
	 * @return string
	 */
	public function getEnteredByUsername()
	{
		return $this->enteredByUsername;
	}

	/**
	 * @param string $enteredByUsername
	 */
	public function setEnteredByUsername($enteredByUsername)
	{
		$this->enteredByUsername = $enteredByUsername;
	}

	/**
	 * @return boolean
	 */
	public function isNotUserBySage50()
	{
		return $this->isNotUserBySage50;
	}

	/**
	 * @param boolean $isNotUserBySage50
	 */
	public function setIsNotUserBySage50($isNotUserBySage50)
	{
		$this->isNotUserBySage50 = $isNotUserBySage50;
	}

	/**
	 * @return boolean
	 */
	public function isPaidByWebStore()
	{
		return $this->isPaidByWebStore;
	}

	/**
	 * @param boolean $isPaidByWebStore
	 */
	public function setIsPaidByWebStore($isPaidByWebStore)
	{
		$this->isPaidByWebStore = $isPaidByWebStore;
	}

	/**
	 * @return int
	 */
	public function getOrderType()
	{
		return $this->orderType;
	}

	/**
	 * @param int $orderType
	 */
	public function setOrderType($orderType)
	{
		$this->orderType = $orderType;
	}

	/**
	 * @return boolean
	 */
	public function isPrePaid()
	{
		return $this->isPrePaid;
	}

	/**
	 * @param boolean $isPrePaid
	 */
	public function setIsPrePaid($isPrePaid)
	{
		$this->isPrePaid = $isPrePaid;
	}

	/**
	 * @return int
	 */
	public function getOriginalPrepaymentId()
	{
		return $this->originalPrepaymentId;
	}

	/**
	 * @param int $originalPrepaymentId
	 */
	public function setOriginalPrepaymentId($originalPrepaymentId)
	{
		$this->originalPrepaymentId = $originalPrepaymentId;
	}

	/**
	 * @return int
	 */
	public function getPrepaymentId()
	{
		return $this->prepaymentId;
	}

	/**
	 * @param int $prepaymentId
	 */
	public function setPrepaymentId($prepaymentId)
	{
		$this->prepaymentId = $prepaymentId;
	}

	/**
	 * @return float
	 */
	public function getPrepaymentAmount()
	{
		return $this->prepaymentAmount;
	}

	/**
	 * @param float $prepaymentAmount
	 */
	public function setPrepaymentAmount($prepaymentAmount)
	{
		$this->prepaymentAmount = $prepaymentAmount;
	}

	/**
	 * @return int
	 */
	public function getSoldById()
	{
		return $this->soldById;
	}

	/**
	 * @param int $soldById
	 */
	public function setSoldById($soldById)
	{
		$this->soldById = $soldById;
	}

	/**
	 * @return string
	 */
	public function getSoldByName()
	{
		return $this->soldByName;
	}

	/**
	 * @param string $soldByName
	 */
	public function setSoldByName($soldByName)
	{
		$this->soldByName = $soldByName;
	}

	/**
	 * @return boolean
	 */
	public function isDepositSlipCleared()
	{
		return $this->isDepositSlipCleared;
	}

	/**
	 * @param boolean $isDepositSlipCleared
	 */
	public function setIsDepositSlipCleared($isDepositSlipCleared)
	{
		$this->isDepositSlipCleared = $isDepositSlipCleared;
	}

	/**
	 * @return int
	 */
	public function getInventoryLocationId()
	{
		return $this->inventoryLocationId;
	}

	/**
	 * @param int $inventoryLocationId
	 */
	public function setInventoryLocationId($inventoryLocationId)
	{
		$this->inventoryLocationId = $inventoryLocationId;
	}

	/**
	 * @return boolean
	 */
	public function isTransferBetweenLocations()
	{
		return $this->isTransferBetweenLocations;
	}

	/**
	 * @param boolean $isTransferBetweenLocations
	 */
	public function setIsTransferBetweenLocations($isTransferBetweenLocations)
	{
		$this->isTransferBetweenLocations = $isTransferBetweenLocations;
	}

	/**
	 * @return boolean
	 */
	public function isRemovedFromBatchList()
	{
		return $this->isRemovedFromBatchList;
	}

	/**
	 * @param boolean $isRemovedFromBatchList
	 */
	public function setIsRemovedFromBatchList($isRemovedFromBatchList)
	{
		$this->isRemovedFromBatchList = $isRemovedFromBatchList;
	}

	/**
	 * @return boolean
	 */
	public function isPrintedAsPackingSlip()
	{
		return $this->isPrintedAsPackingSlip;
	}

	/**
	 * @param boolean $isPrintedAsPackingSlip
	 */
	public function setIsPrintedAsPackingSlip($isPrintedAsPackingSlip)
	{
		$this->isPrintedAsPackingSlip = $isPrintedAsPackingSlip;
	}

	/**
	 * @return boolean
	 */
	public function isRemovedFromPackingSlipBatchPrintingList()
	{
		return $this->isRemovedFromPackingSlipBatchPrintingList;
	}

	/**
	 * @param boolean $isRemovedFromPackingSlipBatchPrintingList
	 */
	public function setIsRemovedFromPackingSlipBatchPrintingList($isRemovedFromPackingSlipBatchPrintingList)
	{
		$this->isRemovedFromPackingSlipBatchPrintingList = $isRemovedFromPackingSlipBatchPrintingList;
	}

	/**
	 * @return int
	 */
	public function getCreditCardTransactionId()
	{
		return $this->creditCardTransactionId;
	}

	/**
	 * @param int $creditCardTransactionId
	 */
	public function setCreditCardTransactionId($creditCardTransactionId)
	{
		$this->creditCardTransactionId = $creditCardTransactionId;
	}

	/**
	 * @return boolean
	 */
	public function isPaidByDirectPayment()
	{
		return $this->isPaidByDirectPayment;
	}

	/**
	 * @param boolean $isPaidByDirectPayment
	 */
	public function setIsPaidByDirectPayment($isPaidByDirectPayment)
	{
		$this->isPaidByDirectPayment = $isPaidByDirectPayment;
	}
}
