<?php
namespace Sinergi\Sage50\Employee;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="temp", uniqueConstraints={@ORM\UniqueConstraint(name="KEY_1", columns={"sName"})})
 */
class EmployeeEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="lId", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id = 0;

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
     * @ORM\Column(name="dtBirth", type="datetime", nullable=true)
     * @var DateTime
     */
    private $birthDate;

    /**
     * @ORM\Column(name="dtHire", type="datetime", nullable=true)
     * @var DateTime
     */
    private $hireDate;

    /**
     * @ORM\Column(name="sSIN", type="string", length=9, nullable=true)
     * @var string
     */
    private $socialInsuranceNumber;

    /**
     * @ORM\Column(name="nProvNum", type="smallint", nullable=true)
     * @var int
     */
    private $provinceNumber;

    /**
     * @ORM\Column(name="dFedBase", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $federalBaseClaimAmount;

    /**
     * @ORM\Column(name="dProvBase", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provincialBaseClaimAmount;

    /**
     * @ORM\Column(name="dExtraTax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dditionalTax;

    /**
     * @ORM\Column(name="fEIRate", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $eiRate;

    /**
     * @ORM\Column(name="bInsure", type="boolean", nullable=true)
     * @var bool
     */
    private $isEiUsed;

    /**
     * @ORM\Column(name="bRetain", type="boolean", nullable=true)
     * @var bool
     */
    private $isHolidayPayRetained;

    /**
     * @ORM\Column(name="bMemInTodo", type="boolean", nullable=true)
     * @var bool
     */
    private $isMemoInTodo;

    /**
     * @ORM\Column(name="nPayPeriod", type="smallint", nullable=true)
     * @var int
     */
    private $payPeriodNumber;

    /**
     * @ORM\Column(name="dtLastPaid", type="datetime", nullable=true)
     * @var DateTime
     */
    private $lastPaidDate;

    /**
     * @ORM\Column(name="bInactive", type="boolean", nullable=true)
     * @var bool
     */
    private $isInactive;

    /**
     * @ORM\Column(name="dFedIndex", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $federalClaimRateIndexing;

    /**
     * @ORM\Column(name="dProvIndex", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provincialClaimRateIndexing;

    /**
     * @ORM\Column(name="bWageExp", type="boolean", nullable=true)
     * @var bool
     */
    private $isWageExpenseAccount;

    /**
     * @ORM\Column(name="lAcWageExp", type="integer", nullable=true)
     * @var int
     */
    private $wageExpenseAccount;

    /**
     * @ORM\Column(name="dtTerm", type="datetime", nullable=true)
     * @var DateTime
     */
    private $terminationDate;

    /**
     * @ORM\Column(name="cROECode", type="string", length=1, nullable=true)
     * @var string
     */
    private $recordOfEmploymentCode;

    /**
     * @ORM\Column(name="lDpWageExp", type="integer", nullable=true)
     * @var int
     */
    private $wageExpenseAccountDepartmentId;

    /**
     * @ORM\Column(name="lDfltDptId", type="integer", nullable=true)
     * @var int
     */
    private $defaultDepartementId;

    /**
     * @ORM\Column(name="lCompId", type="integer", nullable=true)
     * @var int
     */
    private $companyId;

    /**
     * @ORM\Column(name="bDirectDep", type="boolean", nullable=true)
     * @var bool
     */
    private $isDirectDeposit;

    /**
     * @ORM\Column(name="dEmpEtHrs", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $hoursWorked;

    /**
     * @ORM\Column(name="dEmpEtATrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $percentageHoursWorkedEntitlementA;

    /**
     * @ORM\Column(name="dEmpEtAMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $maximumDaysEntitlementA;

    /**
     * @ORM\Column(name="bEmpEtAClr", type="boolean", nullable=true)
     * @var bool
     */
    private $isClearDaysEntitlementA;

    /**
     * @ORM\Column(name="dEmpEtBTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $percentageHoursWorkedEntitlementB;

    /**
     * @ORM\Column(name="dEmpEtBMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $maximumDaysEntitlementB;

    /**
     * @ORM\Column(name="bEmpEtBClr", type="boolean", nullable=true)
     * @var bool
     */
    private $isClearDaysEntitlementB;

    /**
     * @ORM\Column(name="dEmpEtCTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $percentageHoursWorkedEntitlementC;

    /**
     * @ORM\Column(name="dEmpEtCMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $maximumDaysEntitlementC;

    /**
     * @ORM\Column(name="bEmpEtCClr", type="boolean", nullable=true)
     * @var bool
     */
    private $isClearDaysEntitlementC;

    /**
     * @ORM\Column(name="dEmpEtDTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $percentageHoursWorkedEntitlementD;

    /**
     * @ORM\Column(name="dEmpEtDMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $maximumDaysEntitlementD;

    /**
     * @ORM\Column(name="bEmpEtDClr", type="boolean", nullable=true)
     * @var bool
     */
    private $isClearDaysEntitlementD;

    /**
     * @ORM\Column(name="dEmpEtETrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $percentageHoursWorkedEntitlementE;

    /**
     * @ORM\Column(name="dEmpEtEMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $maximumDaysEntitlementE;

    /**
     * @ORM\Column(name="bEmpEtEClr", type="boolean", nullable=true)
     * @var bool
     */
    private $isClearDaysEntitlementE;

    /**
     * @ORM\Column(name="dDefUDExpA", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $userDefinedExpenseA;

    /**
     * @ORM\Column(name="dDefUDExpB", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $userDefinedExpenseB;

    /**
     * @ORM\Column(name="dDefUDExpC", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $userDefinedExpenseC;

    /**
     * @ORM\Column(name="dDefUDExpD", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $userDefinedExpenseD;

    /**
     * @ORM\Column(name="dDefUDExpE", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $userDefinedExpenseE;

    /**
     * @ORM\Column(name="bCPPExempt", type="boolean", nullable=true)
     * @var bool
     */
    private $isCppQppExcempt;

    /**
     * @ORM\Column(name="lJobCatId", type="integer", nullable=true)
     * @var int
     */
    private $jobCategoryId;

    /**
     * @ORM\Column(name="nLangPref", type="smallint", nullable=true)
     * @var int
     */
    private $preferredLanguage;

    /**
     * @ORM\Column(name="lModVer", type="integer", nullable=true)
     * @var int
     */
    private $recordChangeCounter;

    /**
     * @ORM\Column(name="sRPPRegNo", type="string", length=7, nullable=true)
     * @var string
     */
    private $RppOrDspRegistrationNumber;

    /**
     * @ORM\Column(name="sEmpCode", type="string", length=2, nullable=true)
     * @var string
     */
    private $employmentCode;

    /**
     * @ORM\Column(name="fPenAdj", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $pensionAdjustmentAmount;

    /**
     * @ORM\Column(name="nAdrProvCD", type="smallint", nullable=true)
     * @var int
     */
    private $provinceCode;

    /**
     * @ORM\Column(name="lExpGrpId", type="integer", nullable=true)
     * @var int
     */
    private $expenseGroupId;

    /**
     * @ORM\Column(name="bQpipIns", type="boolean", nullable=true)
     * @var bool
     */
    private $isDeductQpip;

    /**
     * @ORM\Column(name="bVacOnVac", type="boolean", nullable=true)
     * @var bool
     */
    private $isVacationOnVacationPay;

    /**
     * @ORM\Column(name="dAddQueTax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $additonalQuebecTax;

    /**
     * @ORM\Column(name="sEmail", type="string", length=50, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="dFedNIndx", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $federalClaimRateNonIndexing;

    /**
     * @ORM\Column(name="dProvNIndx", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provincialClaimRateNonIndexing;

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
     * @return DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     * @return $this
     */
    public function setBirthDate(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getHireDate()
    {
        return $this->hireDate;
    }

    /**
     * @param DateTime $hireDate
     * @return $this
     */
    public function setHireDate(DateTime $hireDate)
    {
        $this->hireDate = $hireDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSocialInsuranceNumber()
    {
        return $this->socialInsuranceNumber;
    }

    /**
     * @param string $socialInsuranceNumber
     * @return $this
     */
    public function setSocialInsuranceNumber($socialInsuranceNumber)
    {
        $this->socialInsuranceNumber = $socialInsuranceNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getProvinceNumber()
    {
        return $this->provinceNumber;
    }

    /**
     * @param int $provinceNumber
     * @return $this
     */
    public function setProvinceNumber($provinceNumber)
    {
        $this->provinceNumber = $provinceNumber;
        return $this;
    }

    /**
     * @return float
     */
    public function getFederalBaseClaimAmount()
    {
        return $this->federalBaseClaimAmount;
    }

    /**
     * @param float $federalBaseClaimAmount
     * @return $this
     */
    public function setFederalBaseClaimAmount($federalBaseClaimAmount)
    {
        $this->federalBaseClaimAmount = $federalBaseClaimAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvincialBaseClaimAmount()
    {
        return $this->provincialBaseClaimAmount;
    }

    /**
     * @param float $provincialBaseClaimAmount
     * @return $this
     */
    public function setProvincialBaseClaimAmount($provincialBaseClaimAmount)
    {
        $this->provincialBaseClaimAmount = $provincialBaseClaimAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getDditionalTax()
    {
        return $this->dditionalTax;
    }

    /**
     * @param float $dditionalTax
     * @return $this
     */
    public function setDditionalTax($dditionalTax)
    {
        $this->dditionalTax = $dditionalTax;
        return $this;
    }

    /**
     * @return float
     */
    public function getEiRate()
    {
        return $this->eiRate;
    }

    /**
     * @param float $eiRate
     * @return $this
     */
    public function setEiRate($eiRate)
    {
        $this->eiRate = $eiRate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEiUsed()
    {
        return $this->isEiUsed;
    }

    /**
     * @param boolean $isEiUsed
     * @return $this
     */
    public function setIsEiUsed($isEiUsed)
    {
        $this->isEiUsed = $isEiUsed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHolidayPayRetained()
    {
        return $this->isHolidayPayRetained;
    }

    /**
     * @param boolean $isHolidayPayRetained
     * @return $this
     */
    public function setIsHolidayPayRetained($isHolidayPayRetained)
    {
        $this->isHolidayPayRetained = $isHolidayPayRetained;
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
     * @return int
     */
    public function getPayPeriodNumber()
    {
        return $this->payPeriodNumber;
    }

    /**
     * @param int $payPeriodNumber
     * @return $this
     */
    public function setPayPeriodNumber($payPeriodNumber)
    {
        $this->payPeriodNumber = $payPeriodNumber;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastPaidDate()
    {
        return $this->lastPaidDate;
    }

    /**
     * @param DateTime $lastPaidDate
     * @return $this
     */
    public function setLastPaidDate(DateTime $lastPaidDate)
    {
        $this->lastPaidDate = $lastPaidDate;
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
     * @return float
     */
    public function getFederalClaimRateIndexing()
    {
        return $this->federalClaimRateIndexing;
    }

    /**
     * @param float $federalClaimRateIndexing
     * @return $this
     */
    public function setFederalClaimRateIndexing($federalClaimRateIndexing)
    {
        $this->federalClaimRateIndexing = $federalClaimRateIndexing;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvincialClaimRateIndexing()
    {
        return $this->provincialClaimRateIndexing;
    }

    /**
     * @param float $provincialClaimRateIndexing
     * @return $this
     */
    public function setProvincialClaimRateIndexing($provincialClaimRateIndexing)
    {
        $this->provincialClaimRateIndexing = $provincialClaimRateIndexing;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWageExpenseAccount()
    {
        return $this->isWageExpenseAccount;
    }

    /**
     * @param boolean $isWageExpenseAccount
     * @return $this
     */
    public function setIsWageExpenseAccount($isWageExpenseAccount)
    {
        $this->isWageExpenseAccount = $isWageExpenseAccount;
        return $this;
    }

    /**
     * @return int
     */
    public function getWageExpenseAccount()
    {
        return $this->wageExpenseAccount;
    }

    /**
     * @param int $wageExpenseAccount
     * @return $this
     */
    public function setWageExpenseAccount($wageExpenseAccount)
    {
        $this->wageExpenseAccount = $wageExpenseAccount;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTerminationDate()
    {
        return $this->terminationDate;
    }

    /**
     * @param DateTime $terminationDate
     * @return $this
     */
    public function setTerminationDate(DateTime $terminationDate)
    {
        $this->terminationDate = $terminationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordOfEmploymentCode()
    {
        return $this->recordOfEmploymentCode;
    }

    /**
     * @param string $recordOfEmploymentCode
     * @return $this
     */
    public function setRecordOfEmploymentCode($recordOfEmploymentCode)
    {
        $this->recordOfEmploymentCode = $recordOfEmploymentCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getWageExpenseAccountDepartmentId()
    {
        return $this->wageExpenseAccountDepartmentId;
    }

    /**
     * @param int $wageExpenseAccountDepartmentId
     * @return $this
     */
    public function setWageExpenseAccountDepartmentId($wageExpenseAccountDepartmentId)
    {
        $this->wageExpenseAccountDepartmentId = $wageExpenseAccountDepartmentId;
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
    public function isDirectDeposit()
    {
        return $this->isDirectDeposit;
    }

    /**
     * @param boolean $isDirectDeposit
     * @return $this
     */
    public function setIsDirectDeposit($isDirectDeposit)
    {
        $this->isDirectDeposit = $isDirectDeposit;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoursWorked()
    {
        return $this->hoursWorked;
    }

    /**
     * @param float $hoursWorked
     * @return $this
     */
    public function setHoursWorked($hoursWorked)
    {
        $this->hoursWorked = $hoursWorked;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentageHoursWorkedEntitlementA()
    {
        return $this->percentageHoursWorkedEntitlementA;
    }

    /**
     * @param float $percentageHoursWorkedEntitlementA
     * @return $this
     */
    public function setPercentageHoursWorkedEntitlementA($percentageHoursWorkedEntitlementA)
    {
        $this->percentageHoursWorkedEntitlementA = $percentageHoursWorkedEntitlementA;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumDaysEntitlementA()
    {
        return $this->maximumDaysEntitlementA;
    }

    /**
     * @param float $maximumDaysEntitlementA
     * @return $this
     */
    public function setMaximumDaysEntitlementA($maximumDaysEntitlementA)
    {
        $this->maximumDaysEntitlementA = $maximumDaysEntitlementA;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClearDaysEntitlementA()
    {
        return $this->isClearDaysEntitlementA;
    }

    /**
     * @param boolean $isClearDaysEntitlementA
     * @return $this
     */
    public function setIsClearDaysEntitlementA($isClearDaysEntitlementA)
    {
        $this->isClearDaysEntitlementA = $isClearDaysEntitlementA;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentageHoursWorkedEntitlementB()
    {
        return $this->percentageHoursWorkedEntitlementB;
    }

    /**
     * @param float $percentageHoursWorkedEntitlementB
     * @return $this
     */
    public function setPercentageHoursWorkedEntitlementB($percentageHoursWorkedEntitlementB)
    {
        $this->percentageHoursWorkedEntitlementB = $percentageHoursWorkedEntitlementB;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumDaysEntitlementB()
    {
        return $this->maximumDaysEntitlementB;
    }

    /**
     * @param float $maximumDaysEntitlementB
     * @return $this
     */
    public function setMaximumDaysEntitlementB($maximumDaysEntitlementB)
    {
        $this->maximumDaysEntitlementB = $maximumDaysEntitlementB;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClearDaysEntitlementB()
    {
        return $this->isClearDaysEntitlementB;
    }

    /**
     * @param boolean $isClearDaysEntitlementB
     * @return $this
     */
    public function setIsClearDaysEntitlementB($isClearDaysEntitlementB)
    {
        $this->isClearDaysEntitlementB = $isClearDaysEntitlementB;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentageHoursWorkedEntitlementC()
    {
        return $this->percentageHoursWorkedEntitlementC;
    }

    /**
     * @param float $percentageHoursWorkedEntitlementC
     * @return $this
     */
    public function setPercentageHoursWorkedEntitlementC($percentageHoursWorkedEntitlementC)
    {
        $this->percentageHoursWorkedEntitlementC = $percentageHoursWorkedEntitlementC;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumDaysEntitlementC()
    {
        return $this->maximumDaysEntitlementC;
    }

    /**
     * @param float $maximumDaysEntitlementC
     * @return $this
     */
    public function setMaximumDaysEntitlementC($maximumDaysEntitlementC)
    {
        $this->maximumDaysEntitlementC = $maximumDaysEntitlementC;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClearDaysEntitlementC()
    {
        return $this->isClearDaysEntitlementC;
    }

    /**
     * @param boolean $isClearDaysEntitlementC
     * @return $this
     */
    public function setIsClearDaysEntitlementC($isClearDaysEntitlementC)
    {
        $this->isClearDaysEntitlementC = $isClearDaysEntitlementC;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentageHoursWorkedEntitlementD()
    {
        return $this->percentageHoursWorkedEntitlementD;
    }

    /**
     * @param float $percentageHoursWorkedEntitlementD
     * @return $this
     */
    public function setPercentageHoursWorkedEntitlementD($percentageHoursWorkedEntitlementD)
    {
        $this->percentageHoursWorkedEntitlementD = $percentageHoursWorkedEntitlementD;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumDaysEntitlementD()
    {
        return $this->maximumDaysEntitlementD;
    }

    /**
     * @param float $maximumDaysEntitlementD
     * @return $this
     */
    public function setMaximumDaysEntitlementD($maximumDaysEntitlementD)
    {
        $this->maximumDaysEntitlementD = $maximumDaysEntitlementD;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClearDaysEntitlementD()
    {
        return $this->isClearDaysEntitlementD;
    }

    /**
     * @param boolean $isClearDaysEntitlementD
     * @return $this
     */
    public function setIsClearDaysEntitlementD($isClearDaysEntitlementD)
    {
        $this->isClearDaysEntitlementD = $isClearDaysEntitlementD;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentageHoursWorkedEntitlementE()
    {
        return $this->percentageHoursWorkedEntitlementE;
    }

    /**
     * @param float $percentageHoursWorkedEntitlementE
     * @return $this
     */
    public function setPercentageHoursWorkedEntitlementE($percentageHoursWorkedEntitlementE)
    {
        $this->percentageHoursWorkedEntitlementE = $percentageHoursWorkedEntitlementE;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumDaysEntitlementE()
    {
        return $this->maximumDaysEntitlementE;
    }

    /**
     * @param float $maximumDaysEntitlementE
     * @return $this
     */
    public function setMaximumDaysEntitlementE($maximumDaysEntitlementE)
    {
        $this->maximumDaysEntitlementE = $maximumDaysEntitlementE;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClearDaysEntitlementE()
    {
        return $this->isClearDaysEntitlementE;
    }

    /**
     * @param boolean $isClearDaysEntitlementE
     * @return $this
     */
    public function setIsClearDaysEntitlementE($isClearDaysEntitlementE)
    {
        $this->isClearDaysEntitlementE = $isClearDaysEntitlementE;
        return $this;
    }

    /**
     * @return float
     */
    public function getUserDefinedExpenseA()
    {
        return $this->userDefinedExpenseA;
    }

    /**
     * @param float $userDefinedExpenseA
     * @return $this
     */
    public function setUserDefinedExpenseA($userDefinedExpenseA)
    {
        $this->userDefinedExpenseA = $userDefinedExpenseA;
        return $this;
    }

    /**
     * @return float
     */
    public function getUserDefinedExpenseB()
    {
        return $this->userDefinedExpenseB;
    }

    /**
     * @param float $userDefinedExpenseB
     * @return $this
     */
    public function setUserDefinedExpenseB($userDefinedExpenseB)
    {
        $this->userDefinedExpenseB = $userDefinedExpenseB;
        return $this;
    }

    /**
     * @return float
     */
    public function getUserDefinedExpenseC()
    {
        return $this->userDefinedExpenseC;
    }

    /**
     * @param float $userDefinedExpenseC
     * @return $this
     */
    public function setUserDefinedExpenseC($userDefinedExpenseC)
    {
        $this->userDefinedExpenseC = $userDefinedExpenseC;
        return $this;
    }

    /**
     * @return float
     */
    public function getUserDefinedExpenseD()
    {
        return $this->userDefinedExpenseD;
    }

    /**
     * @param float $userDefinedExpenseD
     * @return $this
     */
    public function setUserDefinedExpenseD($userDefinedExpenseD)
    {
        $this->userDefinedExpenseD = $userDefinedExpenseD;
        return $this;
    }

    /**
     * @return float
     */
    public function getUserDefinedExpenseE()
    {
        return $this->userDefinedExpenseE;
    }

    /**
     * @param float $userDefinedExpenseE
     * @return $this
     */
    public function setUserDefinedExpenseE($userDefinedExpenseE)
    {
        $this->userDefinedExpenseE = $userDefinedExpenseE;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCppQppExcempt()
    {
        return $this->isCppQppExcempt;
    }

    /**
     * @param boolean $isCppQppExcempt
     * @return $this
     */
    public function setIsCppQppExcempt($isCppQppExcempt)
    {
        $this->isCppQppExcempt = $isCppQppExcempt;
        return $this;
    }

    /**
     * @return int
     */
    public function getJobCategoryId()
    {
        return $this->jobCategoryId;
    }

    /**
     * @param int $jobCategoryId
     * @return $this
     */
    public function setJobCategoryId($jobCategoryId)
    {
        $this->jobCategoryId = $jobCategoryId;
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
    public function getRecordChangeCounter()
    {
        return $this->recordChangeCounter;
    }

    /**
     * @param int $recordChangeCounter
     * @return $this
     */
    public function setRecordChangeCounter($recordChangeCounter)
    {
        $this->recordChangeCounter = $recordChangeCounter;
        return $this;
    }

    /**
     * @return string
     */
    public function getRppOrDspRegistrationNumber()
    {
        return $this->RppOrDspRegistrationNumber;
    }

    /**
     * @param string $RppOrDspRegistrationNumber
     * @return $this
     */
    public function setRppOrDspRegistrationNumber($RppOrDspRegistrationNumber)
    {
        $this->RppOrDspRegistrationNumber = $RppOrDspRegistrationNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmploymentCode()
    {
        return $this->employmentCode;
    }

    /**
     * @param string $employmentCode
     * @return $this
     */
    public function setEmploymentCode($employmentCode)
    {
        $this->employmentCode = $employmentCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getPensionAdjustmentAmount()
    {
        return $this->pensionAdjustmentAmount;
    }

    /**
     * @param float $pensionAdjustmentAmount
     * @return $this
     */
    public function setPensionAdjustmentAmount($pensionAdjustmentAmount)
    {
        $this->pensionAdjustmentAmount = $pensionAdjustmentAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getProvinceCode()
    {
        return $this->provinceCode;
    }

    /**
     * @param int $provinceCode
     * @return $this
     */
    public function setProvinceCode($provinceCode)
    {
        $this->provinceCode = $provinceCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpenseGroupId()
    {
        return $this->expenseGroupId;
    }

    /**
     * @param int $expenseGroupId
     * @return $this
     */
    public function setExpenseGroupId($expenseGroupId)
    {
        $this->expenseGroupId = $expenseGroupId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeductQpip()
    {
        return $this->isDeductQpip;
    }

    /**
     * @param boolean $isDeductQpip
     * @return $this
     */
    public function setIsDeductQpip($isDeductQpip)
    {
        $this->isDeductQpip = $isDeductQpip;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVacationOnVacationPay()
    {
        return $this->isVacationOnVacationPay;
    }

    /**
     * @param boolean $isVacationOnVacationPay
     * @return $this
     */
    public function setIsVacationOnVacationPay($isVacationOnVacationPay)
    {
        $this->isVacationOnVacationPay = $isVacationOnVacationPay;
        return $this;
    }

    /**
     * @return float
     */
    public function getAdditonalQuebecTax()
    {
        return $this->additonalQuebecTax;
    }

    /**
     * @param float $additonalQuebecTax
     * @return $this
     */
    public function setAdditonalQuebecTax($additonalQuebecTax)
    {
        $this->additonalQuebecTax = $additonalQuebecTax;
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
     * @return float
     */
    public function getFederalClaimRateNonIndexing()
    {
        return $this->federalClaimRateNonIndexing;
    }

    /**
     * @param float $federalClaimRateNonIndexing
     * @return $this
     */
    public function setFederalClaimRateNonIndexing($federalClaimRateNonIndexing)
    {
        $this->federalClaimRateNonIndexing = $federalClaimRateNonIndexing;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvincialClaimRateNonIndexing()
    {
        return $this->provincialClaimRateNonIndexing;
    }

    /**
     * @param float $provincialClaimRateNonIndexing
     * @return $this
     */
    public function setProvincialClaimRateNonIndexing($provincialClaimRateNonIndexing)
    {
        $this->provincialClaimRateNonIndexing = $provincialClaimRateNonIndexing;
        return $this;
    }
}
