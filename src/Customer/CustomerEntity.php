<?php

namespace Smart\Sage50\Customer;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Smart\Sage50\Customer\CustomerRepository")
 * @ORM\Table(name="tcustomr", uniqueConstraints={@ORM\UniqueConstraint(name="KEY_1", columns={"sName"})})
 */
class CustomerEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lId", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\OneToOne(targetEntity="\Smart\Sage50\Customer\AdditionalInfo\AdditionalInfoEntity", mappedBy="customer")
     * @var AdditionalInfoEntity
     **/
    private $additionalInfo;

    /**
     * @ORM\Column(name="sName", type="string", length=52, nullable=true)
     * @var string
     */
    private $name;

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
     * @ORM\Column(name="sCntcName", type="string", length=30, nullable=true)
     * @var string
     */
    private $contactName;

    /**
     * @ORM\Column(name="sStreet1", type="string", length=50, nullable=true)
     * @var string
     */
    private $address1;

    /**
     * @ORM\Column(name="sStreet2", type="string", length=50, nullable=true)
     * @var string
     */
    private $address2;

    /**
     * @ORM\Column(name="sCity", type="string", length=35, nullable=true)
     * @var string
     */
    private $city;

    /**
     * @ORM\Column(name="sProvState", type="string", length=20, nullable=true)
     * @var string
     */
    private $region;

    /**
     * @ORM\Column(name="sCountry", type="string", length=30, nullable=true)
     * @var string
     */
    private $country;

    /**
     * @ORM\Column(name="sPostalZip", type="string", length=9, nullable=true)
     * @var string
     */
    private $postalCode;

    /**
     * @ORM\Column(name="sPhone1", type="string", length=25, nullable=true)
     * @var string
     */
    private $phone;

    /**
     * @ORM\Column(name="sPhone2", type="string", length=25, nullable=true)
     * @var string
     */
    private $phone2;

    /**
     * @ORM\Column(name="sFax", type="string", length=25, nullable=true)
     * @var string
     */
    private $fax;

    /**
     * @ORM\Column(name="dCrLimit", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $creditLimit;

    /**
     * @ORM\Column(name="dAmtYtd", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $purchasesYearToDate;

    /**
     * @ORM\Column(name="dLastYrAmt", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $purchasesLastYear;

    /**
     * @ORM\Column(name="fDiscPay", type="float", precision=10, scale=0, nullable=true)
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
     * @ORM\Column(name="bStatement", type="boolean", nullable=true)
     * @var bool
     */
    private $isPrintStatement = false;

    /**
     * @ORM\Column(name="bContOnChq", type="boolean", nullable=true)
     * @var bool
     */
    private $isPrintChequeContact = false;

    /**
     * @ORM\Column(name="bEmailForm", type="boolean", nullable=true)
     * @var bool
     */
    private $isEmailForm = false;

    /**
     * @ORM\Column(name="bEmailCnfm", type="boolean", nullable=true)
     * @var bool
     */
    private $isEmailConfirmation = false;

    /**
     * @ORM\Column(name="bUseSimply", type="boolean", nullable=true)
     * @var bool
     */
    private $isCustomerUsingSage;

    /**
     * @ORM\Column(name="bUseMyItem", type="boolean", nullable=true)
     * @var bool
     */
    private $isCustomerUsingItemNumbers;

    /**
     * @ORM\Column(name="dAmtYtdHm", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $homePurchasesYearToDate;

    /**
     * @ORM\Column(name="dAmtLYHm", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $homePurchasesLastYear;

    /**
     * @ORM\Column(name="dCrLimitHm", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $homeCreditLimit;

    /**
     * @ORM\Column(name="bMemInToDo", type="boolean", nullable=true)
     * @var bool
     */
    private $isMemoInTodo;

    /**
     * @ORM\Column(name="bUsed", type="boolean", nullable=true)
     * @var bool
     */
    private $isUsed;

    /**
     * @ORM\Column(name="lCurrncyId", type="integer", nullable=true)
     * @var int
     */
    private $currencyId;

    /**
     * @ORM\Column(name="sEmail", type="string", length=50, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="sWebSite", type="string", length=50, nullable=true)
     * @var string
     */
    private $website;

    /**
     * @ORM\Column(name="bUseMailAd", type="boolean", nullable=true)
     * @var bool
     */
    private $isUsingMailingAddress;

    /**
     * @ORM\Column(name="bInactive", type="boolean", nullable=true)
     * @var bool
     */
    private $isInactive;

    /**
     * @ORM\Column(name="lTaxCode", type="integer", nullable=true)
     * @var int
     */
    private $taxCodeId;

    /**
     * @ORM\Column(name="bIntCust", type="boolean", nullable=true)
     * @var bool
     */
    private $isInternal;

    /**
     * @ORM\Column(name="lDfltDptId", type="integer", nullable=true)
     * @var int
     */
    private $defaultDepartementId;

    /**
     * @ORM\Column(name="lAcDefRev", type="integer", nullable=true)
     * @var int
     */
    private $defaultRevenueAccount;

    /**
     * @ORM\Column(name="lDpDefRev", type="integer", nullable=true)
     * @var int
     */
    private $defaultRevenueAccountDepartementId;

    /**
     * @ORM\Column(name="lCompId", type="integer", nullable=true)
     * @var int
     */
    private $companyId;

    /**
     * @ORM\Column(name="nLangPref", type="smallint", nullable=true)
     * @var int
     */
    private $preferredLanguage;

    /**
     * @ORM\Column(name="lPrcListId", type="integer", nullable=true)
     * @var int
     */
    private $priceListId = 0;

    /**
     * @ORM\Column(name="dtSince", type="datetime", nullable=true)
     * @var DateTime
     */
    private $customerSinceDate;

    /**
     * @ORM\Column(name="dtLastSal", type="datetime", nullable=true)
     * @var DateTime
     */
    private $lastSaleDate;

    /**
     * @ORM\Column(name="lInvLocId", type="integer", nullable=true)
     * @var int
     */
    private $inventoryLocationId = 0;

    /**
     * @ORM\Column(name="dStdDisc", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $defaultDiscountRate;

    /**
     * @ORM\Column(name="lSalManID", type="integer", nullable=true)
     * @var int
     */
    private $defaultSalesmanId;

    /**
     * @ORM\Column(name="bDirectPay", type="boolean", nullable=true)
     * @var bool
     */
    private $isUsingDirectPayment = false;

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
     * @return AdditionalInfoEntity
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
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
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     * @return $this
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return $this
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return $this
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     * @return $this
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return float
     */
    public function getCreditLimit()
    {
        return $this->creditLimit;
    }

    /**
     * @param float $creditLimit
     * @return $this
     */
    public function setCreditLimit($creditLimit)
    {
        $this->creditLimit = $creditLimit;
        return $this;
    }

    /**
     * @return float
     */
    public function getPurchasesYearToDate()
    {
        return $this->purchasesYearToDate;
    }

    /**
     * @param float $purchasesYearToDate
     * @return $this
     */
    public function setPurchasesYearToDate($purchasesYearToDate)
    {
        $this->purchasesYearToDate = $purchasesYearToDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getPurchasesLastYear()
    {
        return $this->purchasesLastYear;
    }

    /**
     * @param float $purchasesLastYear
     * @return $this
     */
    public function setPurchasesLastYear($purchasesLastYear)
    {
        $this->purchasesLastYear = $purchasesLastYear;
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
     * @return boolean
     */
    public function isPrintStatement()
    {
        return $this->isPrintStatement;
    }

    /**
     * @param boolean $isPrintStatement
     * @return $this
     */
    public function setIsPrintStatement($isPrintStatement)
    {
        $this->isPrintStatement = $isPrintStatement;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPrintChequeContact()
    {
        return $this->isPrintChequeContact;
    }

    /**
     * @param boolean $isPrintChequeContact
     * @return $this
     */
    public function setIsPrintChequeContact($isPrintChequeContact)
    {
        $this->isPrintChequeContact = $isPrintChequeContact;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmailForm()
    {
        return $this->isEmailForm;
    }

    /**
     * @param boolean $isEmailForm
     * @return $this
     */
    public function setIsEmailForm($isEmailForm)
    {
        $this->isEmailForm = $isEmailForm;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmailConfirmation()
    {
        return $this->isEmailConfirmation;
    }

    /**
     * @param boolean $isEmailConfirmation
     * @return $this
     */
    public function setIsEmailConfirmation($isEmailConfirmation)
    {
        $this->isEmailConfirmation = $isEmailConfirmation;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomerUsingSage()
    {
        return $this->isCustomerUsingSage;
    }

    /**
     * @param boolean $isCustomerUsingSage
     * @return $this
     */
    public function setIsCustomerUsingSage($isCustomerUsingSage)
    {
        $this->isCustomerUsingSage = $isCustomerUsingSage;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomerUsingItemNumbers()
    {
        return $this->isCustomerUsingItemNumbers;
    }

    /**
     * @param boolean $isCustomerUsingItemNumbers
     * @return $this
     */
    public function setIsCustomerUsingItemNumbers($isCustomerUsingItemNumbers)
    {
        $this->isCustomerUsingItemNumbers = $isCustomerUsingItemNumbers;
        return $this;
    }

    /**
     * @return float
     */
    public function getHomePurchasesYearToDate()
    {
        return $this->homePurchasesYearToDate;
    }

    /**
     * @param float $homePurchasesYearToDate
     * @return $this
     */
    public function setHomePurchasesYearToDate($homePurchasesYearToDate)
    {
        $this->homePurchasesYearToDate = $homePurchasesYearToDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getHomePurchasesLastYear()
    {
        return $this->homePurchasesLastYear;
    }

    /**
     * @param float $homePurchasesLastYear
     * @return $this
     */
    public function setHomePurchasesLastYear($homePurchasesLastYear)
    {
        $this->homePurchasesLastYear = $homePurchasesLastYear;
        return $this;
    }

    /**
     * @return float
     */
    public function getHomeCreditLimit()
    {
        return $this->homeCreditLimit;
    }

    /**
     * @param float $homeCreditLimit
     * @return $this
     */
    public function setHomeCreditLimit($homeCreditLimit)
    {
        $this->homeCreditLimit = $homeCreditLimit;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMemoInTodo()
    {
        return $this->isMemoInTodo;
    }

    /**
     * @param boolean $isMemoInTodo
     * @return $this
     */
    public function setIsMemoInTodo($isMemoInTodo)
    {
        $this->isMemoInTodo = $isMemoInTodo;
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return $this
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUsingMailingAddress()
    {
        return $this->isUsingMailingAddress;
    }

    /**
     * @param boolean $isUsingMailingAddress
     * @return $this
     */
    public function setIsUsingMailingAddress($isUsingMailingAddress)
    {
        $this->isUsingMailingAddress = $isUsingMailingAddress;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isInactive()
    {
        return $this->isInactive;
    }

    /**
     * @param boolean $isInactive
     * @return $this
     */
    public function setIsInactive($isInactive)
    {
        $this->isInactive = $isInactive;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxCodeId()
    {
        return $this->taxCodeId;
    }

    /**
     * @param int $taxCodeId
     * @return $this
     */
    public function setTaxCodeId($taxCodeId)
    {
        $this->taxCodeId = $taxCodeId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isInternal()
    {
        return $this->isInternal;
    }

    /**
     * @param boolean $isInternal
     * @return $this
     */
    public function setIsInternal($isInternal)
    {
        $this->isInternal = $isInternal;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultDepartementId()
    {
        return $this->defaultDepartementId;
    }

    /**
     * @param int $defaultDepartementId
     * @return $this
     */
    public function setDefaultDepartementId($defaultDepartementId)
    {
        $this->defaultDepartementId = $defaultDepartementId;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultRevenueAccount()
    {
        return $this->defaultRevenueAccount;
    }

    /**
     * @param int $defaultRevenueAccount
     * @return $this
     */
    public function setDefaultRevenueAccount($defaultRevenueAccount)
    {
        $this->defaultRevenueAccount = $defaultRevenueAccount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultRevenueAccountDepartementId()
    {
        return $this->defaultRevenueAccountDepartementId;
    }

    /**
     * @param int $defaultRevenueAccountDepartementId
     * @return $this
     */
    public function setDefaultRevenueAccountDepartementId($defaultRevenueAccountDepartementId)
    {
        $this->defaultRevenueAccountDepartementId = $defaultRevenueAccountDepartementId;
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
    public function getPriceListId()
    {
        return $this->priceListId;
    }

    /**
     * @param int $priceListId
     * @return $this
     */
    public function setPriceListId($priceListId)
    {
        $this->priceListId = $priceListId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCustomerSinceDate()
    {
        return $this->customerSinceDate;
    }

    /**
     * @param DateTime $customerSinceDate
     * @return $this
     */
    public function setCustomerSinceDate(DateTime $customerSinceDate)
    {
        $this->customerSinceDate = $customerSinceDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastSaleDate()
    {
        return $this->lastSaleDate;
    }

    /**
     * @param DateTime $lastSaleDate
     * @return $this
     */
    public function setLastSaleDate(DateTime $lastSaleDate)
    {
        $this->lastSaleDate = $lastSaleDate;
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
     * @return float
     */
    public function getDefaultDiscountRate()
    {
        return $this->defaultDiscountRate;
    }

    /**
     * @param float $defaultDiscountRate
     * @return $this
     */
    public function setDefaultDiscountRate($defaultDiscountRate)
    {
        $this->defaultDiscountRate = $defaultDiscountRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultSalesmanId()
    {
        return $this->defaultSalesmanId;
    }

    /**
     * @param int $defaultSalesmanId
     * @return $this
     */
    public function setDefaultSalesmanId($defaultSalesmanId)
    {
        $this->defaultSalesmanId = $defaultSalesmanId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUsingDirectPayment()
    {
        return $this->isUsingDirectPayment;
    }

    /**
     * @param boolean $isUsingDirectPayment
     * @return $this
     */
    public function setIsUsingDirectPayment($isUsingDirectPayment)
    {
        $this->isUsingDirectPayment = $isUsingDirectPayment;
        return $this;
    }
}
