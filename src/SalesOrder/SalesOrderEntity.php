<?php

namespace Smart\Sage50\SalesOrder;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Smart\Sage50\SalesOrder\Item\ItemEntity;
use Smart\Sage50\SalesOrder\TotalTaxes\TotalTaxesEntity;

/**
 * @ORM\Entity(repositoryClass="Smart\Sage50\SalesOrder\SalesOrderRepository")
 * @ORM\Table(name="tsalordr", indexes={
 *   @ORM\Index(name="KEY_1", columns={"lCusId"}),
 *   @ORM\Index(name="KEY_2", columns={"sSONum"})
 * })
 */
class SalesOrderEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lId", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\Column(name="lCusId", type="integer", nullable=true)
     * @var int
     */
    private $customerId;

	/**
	 * @ORM\OneToMany(targetEntity="\Smart\Sage50\SalesOrder\Item\ItemEntity", mappedBy="salesOrder")
	 * @var ItemEntity[]
	 **/
	private $items;

	/**
	 * @ORM\OneToOne(targetEntity="\Smart\Sage50\SalesOrder\TotalTaxes\TotalTaxesEntity", mappedBy="salesOrder")
	 * @var TotalTaxesEntity
	 **/
	private $totalTaxes;

	/**
     * @ORM\Column(name="sSONum", type="string", length=20, nullable=true)
     * @var string
     */
    private $orderNumber;

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
     * @ORM\Column(name="sName", type="string", length=52, nullable=true)
     * @var string
     */
    private $customerName;

    /**
     * @ORM\Column(name="sSoldTo1", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress1;

    /**
     * @ORM\Column(name="sSoldTo2", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress2;

    /**
     * @ORM\Column(name="sSoldTo3", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress3;

    /**
     * @ORM\Column(name="sSoldTo4", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress4;

    /**
     * @ORM\Column(name="sSoldTo5", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress5;

    /**
     * @ORM\Column(name="sShipTo1", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress1;

    /**
     * @ORM\Column(name="sShipTo2", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress2;

    /**
     * @ORM\Column(name="sShipTo3", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress3;

    /**
     * @ORM\Column(name="sShipTo4", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress4;

    /**
     * @ORM\Column(name="sShipTo5", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress5;

    /**
     * @ORM\Column(name="sShipTo6", type="string", length=75, nullable=true)
     * @var string
     */
    private $shippingAddress6;

    /**
     * @ORM\Column(name="dtShipDate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $requestedShippingDate;

    /**
     * @ORM\Column(name="dtSODate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $salesOrderDate;

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
     * @ORM\Column(name="sUser", type="string", length=20, nullable=true)
     * @var string
     */
    private $enteredByUsername = 'sysadmin';

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
     * @ORM\Column(name="dTotal", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $totalAmount = 0.00;

    /**
     * @ORM\Column(name="lJourId", type="integer", nullable=true)
     * @var int
     */
    private $nextJournalId = 0;

    /**
     * @ORM\Column(name="sComment", type="string", length=100, nullable=true)
     * @var string
     */
    private $comment = '';

    /**
     * @ORM\Column(name="sShipper", type="string", length=20, nullable=true)
     * @var string
     */
    private $shipperName = '';

    /**
     * @ORM\Column(name="bQuote", type="boolean", nullable=true)
     * @var bool
     */
    private $isQuote = false;

    /**
     * @ORM\Column(name="bImport", type="boolean", nullable=true)
     * @var bool
     */
    private $isImported = false;

    /**
     * @ORM\Column(name="lCurrncyId", type="integer", nullable=true)
     * @var int
     */
    private $currencyId = 0;

    /**
     * @ORM\Column(name="dExchRate", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $exchangeRate = 0;

    /**
     * @ORM\Column(name="bEtran", type="boolean", nullable=true)
     * @var bool
     */
    private $isWebstoreOrder = false;

    /**
     * @ORM\Column(name="bPrePaid", type="boolean", nullable=true)
     * @var bool
     */
    private $isPrePaid = false;

    /**
     * @ORM\Column(name="lPaidJor", type="integer", nullable=true)
     * @var int
     */
    private $prepaidId = 0;

    /**
     * @ORM\Column(name="nPdType", type="smallint", nullable=true)
     * @var int
     */
    private $prepaymentType = false;

    /**
     * @ORM\Column(name="sCrdName", type="string", length=13, nullable=true)
     * @var string
     */
    private $creditCardName = '';

    /**
     * @ORM\Column(name="lAcctNum", type="integer", nullable=true)
     * @var int
     */
    private $accountNumber = 0;

    /**
     * @ORM\Column(name="lDepId", type="integer", nullable=true)
     * @var int
     */
    private $departmentId = 0;

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
     * @ORM\Column(name="sChqNum", type="string", length=20, nullable=true)
     * @var string
     */
    private $chequeNumber = '';

    /**
     * @ORM\Column(name="bDSProc", type="boolean", nullable=true)
     * @var bool
     */
    private $isDepositSlipCleared = 0;

    /**
     * @ORM\Column(name="bCleared", type="boolean", nullable=true)
     * @var bool
     */
    private $isCleared = false;

    /**
     * @ORM\Column(name="lChqId", type="integer", nullable=true)
     * @var int
     */
    private $chequeId = 0;

    /**
     * @ORM\Column(name="lInvLocId", type="integer", nullable=true)
     * @var int
     */
    private $inventoryLocationId = 1;

    /**
     * @ORM\Column(name="bRmBPLst", type="boolean", nullable=true)
     * @var bool
     */
    private $isRemovedFromBatchList = false;

    /**
     * @ORM\Column(name="lAddrId", type="integer", nullable=true)
     * @var int
     */
    private $shippingAddressId = 0;

    /**
     * @ORM\Column(name="nLangPref", type="smallint", nullable=true)
     * @var int
     */
    private $preferredLanguage = 0;

    /**
     * @ORM\Column(name="nFilled", type="smallint", nullable=true)
     * @var int
     */
    private $numberFilled = null;

    /**
     * @ORM\Column(name="bReversed", type="boolean", nullable=true)
     * @var bool
     */
    private $isReversed = false;

    /**
     * @ORM\Column(name="bReversal", type="boolean", nullable=true)
     * @var bool
     */
    private $isReversal = false;

    /**
     * @ORM\Column(name="lCCTransId", type="integer", nullable=true)
     * @var int
     */
    private $creditCardTransactionId = 0;

    /**
     * @ORM\Column(name="lRevCCTrId", type="integer", nullable=true)
     * @var int
     */
    private $removedCreditCardTransactionId = 0;

    public function __construct()
    {
        $this->setRequestedShippingDate(new DateTime('0001-01-01 00:00:00'));
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
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

	/**
	 * @return Item\ItemEntity[]
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param Item\ItemEntity[] $items
	 * @return $this
	 */
	public function setItems($items)
	{
		$this->items = $items;
		return $this;
	}

	/**
	 * @return TotalTaxesEntity
	 */
	public function getTotalTaxes()
	{
		return $this->totalTaxes;
	}

	/**
	 * @param TotalTaxesEntity $totalTaxes
	 * @return $this
	 */
	public function setTotalTaxes(TotalTaxesEntity $totalTaxes)
	{
		$this->totalTaxes = $totalTaxes;
		return $this;
	}

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return $this
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
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
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress1()
    {
        return $this->billingAddress1;
    }

    /**
     * @param string $billingAddress1
     * @return $this
     */
    public function setBillingAddress1($billingAddress1)
    {
        $this->billingAddress1 = $billingAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress2()
    {
        return $this->billingAddress2;
    }

    /**
     * @param string $billingAddress2
     * @return $this
     */
    public function setBillingAddress2($billingAddress2)
    {
        $this->billingAddress2 = $billingAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress3()
    {
        return $this->billingAddress3;
    }

    /**
     * @param string $billingAddress3
     * @return $this
     */
    public function setBillingAddress3($billingAddress3)
    {
        $this->billingAddress3 = $billingAddress3;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress4()
    {
        return $this->billingAddress4;
    }

    /**
     * @param string $billingAddress4
     * @return $this
     */
    public function setBillingAddress4($billingAddress4)
    {
        $this->billingAddress4 = $billingAddress4;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress5()
    {
        return $this->billingAddress5;
    }

    /**
     * @param string $billingAddress5
     * @return $this
     */
    public function setBillingAddress5($billingAddress5)
    {
        $this->billingAddress5 = $billingAddress5;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress1()
    {
        return $this->shippingAddress1;
    }

    /**
     * @param string $shippingAddress1
     * @return $this
     */
    public function setShippingAddress1($shippingAddress1)
    {
        $this->shippingAddress1 = $shippingAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress2()
    {
        return $this->shippingAddress2;
    }

    /**
     * @param string $shippingAddress2
     * @return $this
     */
    public function setShippingAddress2($shippingAddress2)
    {
        $this->shippingAddress2 = $shippingAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress3()
    {
        return $this->shippingAddress3;
    }

    /**
     * @param string $shippingAddress3
     * @return $this
     */
    public function setShippingAddress3($shippingAddress3)
    {
        $this->shippingAddress3 = $shippingAddress3;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress4()
    {
        return $this->shippingAddress4;
    }

    /**
     * @param string $shippingAddress4
     * @return $this
     */
    public function setShippingAddress4($shippingAddress4)
    {
        $this->shippingAddress4 = $shippingAddress4;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress5()
    {
        return $this->shippingAddress5;
    }

    /**
     * @param string $shippingAddress5
     * @return $this
     */
    public function setShippingAddress5($shippingAddress5)
    {
        $this->shippingAddress5 = $shippingAddress5;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress6()
    {
        return $this->shippingAddress6;
    }

    /**
     * @param string $shippingAddress6
     * @return $this
     */
    public function setShippingAddress6($shippingAddress6)
    {
        $this->shippingAddress6 = $shippingAddress6;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getRequestedShippingDate()
    {
        return $this->requestedShippingDate;
    }

    /**
     * @param DateTime $requestedShippingDate
     * @return $this
     */
    public function setRequestedShippingDate(DateTime $requestedShippingDate)
    {
        $this->requestedShippingDate = $requestedShippingDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSalesOrderDate()
    {
        return $this->salesOrderDate;
    }

    /**
     * @param DateTime $salesOrderDate
     * @return $this
     */
    public function setSalesOrderDate(DateTime $salesOrderDate)
    {
        $this->salesOrderDate = $salesOrderDate;
        return $this;
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
     * @return $this
     */
    public function setIsPrinted($isPrinted)
    {
        $this->isPrinted = $isPrinted;
        return $this;
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
     * @return $this
     */
    public function setIsEmailed($isEmailed)
    {
        $this->isEmailed = $isEmailed;
        return $this;
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
     * @return $this
     */
    public function setEnteredByUsername($enteredByUsername)
    {
        $this->enteredByUsername = $enteredByUsername;
        return $this;
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
     * @return $this
     */
    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
        return $this;
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
     * @return $this
     */
    public function setDiscountDay($discountDay)
    {
        $this->discountDay = $discountDay;
        return $this;
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
     * @return $this
     */
    public function setDiscountNetDay($discountNetDay)
    {
        $this->discountNetDay = $discountNetDay;
        return $this;
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
     * @return $this
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getNextJournalId()
    {
        return $this->nextJournalId;
    }

    /**
     * @param int $nextJournalId
     * @return $this
     */
    public function setNextJournalId($nextJournalId)
    {
        $this->nextJournalId = $nextJournalId;
        return $this;
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
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperName()
    {
        return $this->shipperName;
    }

    /**
     * @param string $shipperName
     * @return $this
     */
    public function setShipperName($shipperName)
    {
        $this->shipperName = $shipperName;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isQuote()
    {
        return $this->isQuote;
    }

    /**
     * @param boolean $isQuote
     * @return $this
     */
    public function setIsQuote($isQuote)
    {
        $this->isQuote = $isQuote;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isImported()
    {
        return $this->isImported;
    }

    /**
     * @param boolean $isImported
     * @return $this
     */
    public function setIsImported($isImported)
    {
        $this->isImported = $isImported;
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
     * @return boolean
     */
    public function isWebstoreOrder()
    {
        return $this->isWebstoreOrder;
    }

    /**
     * @param boolean $isWebstoreOrder
     * @return $this
     */
    public function setIsWebstoreOrder($isWebstoreOrder)
    {
        $this->isWebstoreOrder = $isWebstoreOrder;
        return $this;
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
     * @return $this
     */
    public function setIsPrePaid($isPrePaid)
    {
        $this->isPrePaid = $isPrePaid;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrepaidId()
    {
        return $this->prepaidId;
    }

    /**
     * @param int $prepaidId
     * @return $this
     */
    public function setPrepaidId($prepaidId)
    {
        $this->prepaidId = $prepaidId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrepaymentType()
    {
        return $this->prepaymentType;
    }

    /**
     * @param int $prepaymentType
     * @return $this
     */
    public function setPrepaymentType($prepaymentType)
    {
        $this->prepaymentType = $prepaymentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardName()
    {
        return $this->creditCardName;
    }

    /**
     * @param string $creditCardName
     * @return $this
     */
    public function setCreditCardName($creditCardName)
    {
        $this->creditCardName = $creditCardName;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param int $accountNumber
     * @return $this
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     * @return $this
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
        return $this;
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
     * @return $this
     */
    public function setSoldById($soldById)
    {
        $this->soldById = $soldById;
        return $this;
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
     * @return $this
     */
    public function setSoldByName($soldByName)
    {
        $this->soldByName = $soldByName;
        return $this;
    }

    /**
     * @return string
     */
    public function getChequeNumber()
    {
        return $this->chequeNumber;
    }

    /**
     * @param string $chequeNumber
     * @return $this
     */
    public function setChequeNumber($chequeNumber)
    {
        $this->chequeNumber = $chequeNumber;
        return $this;
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
     * @return $this
     */
    public function setIsDepositSlipCleared($isDepositSlipCleared)
    {
        $this->isDepositSlipCleared = $isDepositSlipCleared;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCleared()
    {
        return $this->isCleared;
    }

    /**
     * @param boolean $isCleared
     * @return $this
     */
    public function setIsCleared($isCleared)
    {
        $this->isCleared = $isCleared;
        return $this;
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
     * @return $this
     */
    public function setChequeId($chequeId)
    {
        $this->chequeId = $chequeId;
        return $this;
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
     * @return $this
     */
    public function setInventoryLocationId($inventoryLocationId)
    {
        $this->inventoryLocationId = $inventoryLocationId;
        return $this;
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
     * @return $this
     */
    public function setIsRemovedFromBatchList($isRemovedFromBatchList)
    {
        $this->isRemovedFromBatchList = $isRemovedFromBatchList;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

    /**
     * @param int $shippingAddressId
     * @return $this
     */
    public function setShippingAddressId($shippingAddressId)
    {
        $this->shippingAddressId = $shippingAddressId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPreferredLanguage()
    {
        return $this->preferredLanguage;
    }

    /**
     * @param int $preferredLanguage
     * @return $this
     */
    public function setPreferredLanguage($preferredLanguage)
    {
        $this->preferredLanguage = $preferredLanguage;
        return $this;
    }

    /**
     * @return int
     */
    public function numberFilled()
    {
        return $this->numberFilled;
    }

    /**
     * @param int $numberFilled
     * @return $this
     */
    public function setNumberFilled($numberFilled)
    {
        $this->numberFilled = $numberFilled;
        return $this;
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
     * @return $this
     */
    public function setIsReversed($isReversed)
    {
        $this->isReversed = $isReversed;
        return $this;
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
     * @return $this
     */
    public function setIsReversal($isReversal)
    {
        $this->isReversal = $isReversal;
        return $this;
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
     * @return $this
     */
    public function setCreditCardTransactionId($creditCardTransactionId)
    {
        $this->creditCardTransactionId = $creditCardTransactionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRemovedCreditCardTransactionId()
    {
        return $this->removedCreditCardTransactionId;
    }

    /**
     * @param int $removedCreditCardTransactionId
     * @return $this
     */
    public function setRemovedCreditCardTransactionId($removedCreditCardTransactionId)
    {
        $this->removedCreditCardTransactionId = $removedCreditCardTransactionId;
        return $this;
    }
}
