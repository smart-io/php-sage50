<?php

namespace Smart\Sage50\Invoice;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Smart\Sage50\Invoice\InvoiceRepository")
 * @ORM\Table(name="titlu")
 */
class InvoiceEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lITRecId", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\Column(name="sName", type="string", length=52, nullable=true)
     * @var string
     */
    private $customerName;

    /**
     * @ORM\Column(name="sAddress1", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress1;

    /**
     * @ORM\Column(name="sAddress2", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress2;

    /**
     * @ORM\Column(name="sAddress3", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress3;

    /**
     * @ORM\Column(name="sAddress4", type="string", length=75, nullable=true)
     * @var string
     */
    private $billingAddress4;

    /**
     * @ORM\Column(name="sAddress5", type="string", length=75, nullable=true)
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
     * @ORM\Column(name="dTotal", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $total = 0.00;

    /**
     * @ORM\Column(name="nTSActSort", type="smallint", nullable=true)
     * @var int
     */
    private $timeSlipSortMethod;

    /**
     * @ORM\Column(name="dtTSStart", type="datetime", nullable=true)
     * @var DateTime
     */
    private $timeSlipConsolidationStartDate;

    /**
     * @ORM\Column(name="dtTSEnd", type="datetime", nullable=true)
     * @var DateTime
     */
    private $timeSlipConsolidationEndDate;

    /**
     * @ORM\Column(name="sPONum", type="string", length=20, nullable=true)
     * @var string
     */
    private $orderNumber;

    /**
     * @ORM\Column(name="sShpprName", type="string", length=20, nullable=true)
     * @var string
     */
    private $shipperName;

    /**
     * @ORM\Column(name="sTrackingN", type="string", length=35, nullable=true)
     * @var string
     */
    private $trackingNumber;

    /**
     * @ORM\Column(name="lAcctId", type="integer", nullable=true)
     * @var int
     */
    private $accountId;

    /**
     * @ORM\Column(name="bDistByAmt", type="boolean", nullable=true)
     * @var bool
     */
    private $projectAllocationByAmount;

    /**
     * @ORM\Column(name="b40Data", type="boolean", nullable=true)
     * @var bool
     */
    private $isLegacyData;

    /**
     * @ORM\Column(name="bDeleted", type="boolean", nullable=true)
     * @var bool
     */
    private $isDeleted;

    /**
     * @ORM\Column(name="bNotRecd", type="boolean", nullable=true)
     * @var bool
     */
    private $isNotArrived;

    /**
     * @ORM\Column(name="bFromPO", type="boolean", nullable=true)
     * @var bool
     */
    private $isFromSalesOrder;

    /**
     * @ORM\Column(name="lAcctDptId", type="integer", nullable=true)
     * @var int
     */
    private $accountDepartmentId;

    /**
     * @ORM\Column(name="bAlocToAll", type="boolean", nullable=true)
     * @var bool
     */
    private $isProjectAllocationForEntireTransaction;

    /**
     * @ORM\Column(name="nTmplType", type="smallint", nullable=true)
     * @var int
     */
    private $templateType;

    /**
     * @ORM\Column(name="lAddrId", type="integer", nullable=true)
     * @var int
     */
	private $shippingAddressId = 0;

    /**
     * @ORM\Column(name="dtShipDate", type="datetime", nullable=true)
     * @var DateTime
     */
    private $shipDate;

    /**
     * @ORM\Column(name="nLangPref", type="smallint", nullable=true)
     * @var int
     */
	private $preferredLanguage = 0;

    /**
     * @ORM\Column(name="bUseVenItm", type="boolean", nullable=true)
     * @var bool
     */
    private $isVendorInventory;

    /**
     * @ORM\Column(name="lProjId", type="integer", nullable=true)
     * @var int
     */
    private $projectId;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCustomerName() {
		return $this->customerName;
	}

	/**
	 * @param string $customerName
	 * @return $this
	 */
	public function setCustomerName($customerName) {
		$this->customerName = $customerName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBillingAddress1() {
		return $this->billingAddress1;
	}

	/**
	 * @param string $billingAddress1
	 * @return $this
	 */
	public function setBillingAddress1($billingAddress1) {
		$this->billingAddress1 = $billingAddress1;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBillingAddress2() {
		return $this->billingAddress2;
	}

	/**
	 * @param string $billingAddress2
	 * @return $this
	 */
	public function setBillingAddress2($billingAddress2) {
		$this->billingAddress2 = $billingAddress2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBillingAddress3() {
		return $this->billingAddress3;
	}

	/**
	 * @param string $billingAddress3
	 * @return $this
	 */
	public function setBillingAddress3($billingAddress3) {
		$this->billingAddress3 = $billingAddress3;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBillingAddress4() {
		return $this->billingAddress4;
	}

	/**
	 * @param string $billingAddress4
	 * @return $this
	 */
	public function setBillingAddress4($billingAddress4) {
		$this->billingAddress4 = $billingAddress4;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBillingAddress5() {
		return $this->billingAddress5;
	}

	/**
	 * @param string $billingAddress5
	 * @return $this
	 */
	public function setBillingAddress5($billingAddress5) {
		$this->billingAddress5 = $billingAddress5;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress1() {
		return $this->shippingAddress1;
	}

	/**
	 * @param string $shippingAddress1
	 * @return $this
	 */
	public function setShippingAddress1($shippingAddress1) {
		$this->shippingAddress1 = $shippingAddress1;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress2() {
		return $this->shippingAddress2;
	}

	/**
	 * @param string $shippingAddress2
	 * @return $this
	 */
	public function setShippingAddress2($shippingAddress2) {
		$this->shippingAddress2 = $shippingAddress2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress3() {
		return $this->shippingAddress3;
	}

	/**
	 * @param string $shippingAddress3
	 * @return $this
	 */
	public function setShippingAddress3($shippingAddress3) {
		$this->shippingAddress3 = $shippingAddress3;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress4() {
		return $this->shippingAddress4;
	}

	/**
	 * @param string $shippingAddress4
	 * @return $this
	 */
	public function setShippingAddress4($shippingAddress4) {
		$this->shippingAddress4 = $shippingAddress4;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress5() {
		return $this->shippingAddress5;
	}

	/**
	 * @param string $shippingAddress5
	 * @return $this
	 */
	public function setShippingAddress5($shippingAddress5) {
		$this->shippingAddress5 = $shippingAddress5;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShippingAddress6() {
		return $this->shippingAddress6;
	}

	/**
	 * @param string $shippingAddress6
	 * @return $this
	 */
	public function setShippingAddress6($shippingAddress6) {
		$this->shippingAddress6 = $shippingAddress6;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTotal() {
		return $this->total;
	}

	/**
	 * @param float $total
	 * @return $this
	 */
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTimeSlipSortMethod() {
		return $this->timeSlipSortMethod;
	}

	/**
	 * @param int $timeSlipSortMethod
	 * @return $this
	 */
	public function setTimeSlipSortMethod($timeSlipSortMethod) {
		$this->timeSlipSortMethod = $timeSlipSortMethod;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getTimeSlipConsolidationStartDate() {
		return $this->timeSlipConsolidationStartDate;
	}

	/**
	 * @param DateTime $timeSlipConsolidationStartDate
	 * @return $this
	 */
	public function setTimeSlipConsolidationStartDate(DateTime $timeSlipConsolidationStartDate) {
		$this->timeSlipConsolidationStartDate = $timeSlipConsolidationStartDate;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getTimeSlipConsolidationEndDate() {
		return $this->timeSlipConsolidationEndDate;
	}

	/**
	 * @param DateTime $timeSlipConsolidationEndDate
	 * @return $this
	 */
	public function setTimeSlipConsolidationEndDate(DateTime $timeSlipConsolidationEndDate) {
		$this->timeSlipConsolidationEndDate = $timeSlipConsolidationEndDate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrderNumber() {
		return $this->orderNumber;
	}

	/**
	 * @param string $orderNumber
	 * @return $this
	 */
	public function setOrderNumber($orderNumber) {
		$this->orderNumber = $orderNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getShipperName() {
		return $this->shipperName;
	}

	/**
	 * @param string $shipperName
	 * @return $this
	 */
	public function setShipperName($shipperName) {
		$this->shipperName = $shipperName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTrackingNumber() {
		return $this->trackingNumber;
	}

	/**
	 * @param string $trackingNumber
	 * @return $this
	 */
	public function setTrackingNumber($trackingNumber) {
		$this->trackingNumber = $trackingNumber;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAccountId() {
		return $this->accountId;
	}

	/**
	 * @param int $accountId
	 *
	 * @return $this
	 */
	public function setAccountId($accountId) {
		$this->accountId = $accountId;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isProjectAllocationByAmount() {
		return $this->projectAllocationByAmount;
	}

	/**
	 * @param boolean $projectAllocationByAmount
	 * @return $this
	 */
	public function setProjectAllocationByAmount($projectAllocationByAmount) {
		$this->projectAllocationByAmount = $projectAllocationByAmount;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isLegacyData() {
		return $this->isLegacyData;
	}

	/**
	 * @param boolean $isLegacyData
	 *
	 * @return $this
	 */
	public function setIsLegacyData($isLegacyData) {
		$this->isLegacyData = $isLegacyData;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isDeleted() {
		return $this->isDeleted;
	}

	/**
	 * @param boolean $isDeleted
	 *
	 * @return $this
	 */
	public function setIsDeleted($isDeleted) {
		$this->isDeleted = $isDeleted;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isNotArrived() {
		return $this->isNotArrived;
	}

	/**
	 * @param boolean $isNotArrived
	 * @return $this
	 */
	public function setIsNotArrived($isNotArrived) {
		$this->isNotArrived = $isNotArrived;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isFromSalesOrder() {
		return $this->isFromSalesOrder;
	}

	/**
	 * @param boolean $isFromSalesOrder
	 * @return $this
	 */
	public function setIsFromSalesOrder($isFromSalesOrder) {
		$this->isFromSalesOrder = $isFromSalesOrder;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAccountDepartmentId() {
		return $this->accountDepartmentId;
	}

	/**
	 * @param int $accountDepartmentId
	 * @return $this
	 */
	public function setAccountDepartmentId($accountDepartmentId) {
		$this->accountDepartmentId = $accountDepartmentId;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isProjectAllocationForEntireTransaction() {
		return $this->isProjectAllocationForEntireTransaction;
	}

	/**
	 * @param boolean $isProjectAllocationForEntireTransaction
	 *
	 * @return $this
	 */
	public function setIsProjectAllocationForEntireTransaction($isProjectAllocationForEntireTransaction) {
		$this->isProjectAllocationForEntireTransaction = $isProjectAllocationForEntireTransaction;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTemplateType() {
		return $this->templateType;
	}

	/**
	 * @param int $templateType
	 * @return $this
	 */
	public function setTemplateType($templateType) {
		$this->templateType = $templateType;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getShippingAddressId() {
		return $this->shippingAddressId;
	}

	/**
	 * @param int $shippingAddressId
	 * @return $this
	 */
	public function setShippingAddressId($shippingAddressId) {
		$this->shippingAddressId = $shippingAddressId;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getShipDate() {
		return $this->shipDate;
	}

	/**
	 * @param DateTime $shipDate
	 * @return $this
	 */
	public function setShipDate(DateTime $shipDate) {
		$this->shipDate = $shipDate;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getPreferredLanguage() {
		return $this->preferredLanguage;
	}

	/**
	 * @param int $preferredLanguage
	 * @return $this
	 */
	public function setPreferredLanguage($preferredLanguage) {
		$this->preferredLanguage = $preferredLanguage;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isVendorInventory() {
		return $this->isVendorInventory;
	}

	/**
	 * @param boolean $isVendorInventory
	 * @return $this
	 */
	public function setIsVendorInventory($isVendorInventory) {
		$this->isVendorInventory = $isVendorInventory;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getProjectId() {
		return $this->projectId;
	}

	/**
	 * @param int $projectId
	 * @return $this
	 */
	public function setProjectId($projectId) {
		$this->projectId = $projectId;
		return $this;
	}
}
