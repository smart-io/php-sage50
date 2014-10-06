<?php
namespace Sinergi\Sage50\Employee;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tEmp", uniqueConstraints={@ORM\UniqueConstraint(name="KEY_1", columns={"sName"})})
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
    private $fedBase;

    /**
     * @ORM\Column(name="dProvBase", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provBase;

    /**
     * @ORM\Column(name="dExtraTax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $extraTax;

    /**
     * @ORM\Column(name="fEIRate", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $eiRate;

    /**
     * @ORM\Column(name="bInsure", type="boolean", nullable=true)
     * @var bool
     */
    private $isInsured;

    /**
     * @ORM\Column(name="bRetain", type="boolean", nullable=true)
     * @var bool
     */
    private $isRetained;

    /**
     * @ORM\Column(name="bMemInTodo", type="boolean", nullable=true)
     * @var bool
     */
    private $isMemInTodo;

    /**
     * @ORM\Column(name="nPayPeriod", type="smallint", nullable=true)
     * @var int
     */
    private $payPeriod;

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
    private $fedIndex;

    /**
     * @ORM\Column(name="dProvIndex", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provIndex;

    /**
     * @ORM\Column(name="bWageExp", type="boolean", nullable=true)
     * @var bool
     */
    private $isWageExpired;

    /**
     * @ORM\Column(name="lAcWageExp", type="integer", nullable=true)
     * @var int
     */
    private $isAcWageExpired;

    /**
     * @ORM\Column(name="dtTerm", type="datetime", nullable=true)
     * @var DateTime
     */
    private $termDate;

    /**
     * @ORM\Column(name="cROECode", type="string", length=1, nullable=true)
     * @var string
     */
    private $roeCode;

    /**
     * @ORM\Column(name="lDpWageExp", type="integer", nullable=true)
     * @var int
     */
    private $dpWageExp;

    /**
     * @ORM\Column(name="lDfltDptId", type="integer", nullable=true)
     * @var int
     */
    private $dfltDptId;

    /**
     * @ORM\Column(name="lCompId", type="integer", nullable=true)
     * @var int
     */
    private $compId;

    /**
     * @ORM\Column(name="bDirectDep", type="boolean", nullable=true)
     * @var bool
     */
    private $isDirectDeposit;

    /**
     * @ORM\Column(name="dEmpEtHrs", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtHrs;

    /**
     * @ORM\Column(name="dEmpEtATrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtATrk;

    /**
     * @ORM\Column(name="dEmpEtAMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtAMax;

    /**
     * @ORM\Column(name="bEmpEtAClr", type="boolean", nullable=true)
     * @var bool
     */
    private $empEtAClr;

    /**
     * @ORM\Column(name="dEmpEtBTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtBTrk;

    /**
     * @ORM\Column(name="dEmpEtBMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtBMax;

    /**
     * @ORM\Column(name="bEmpEtBClr", type="boolean", nullable=true)
     * @var bool
     */
    private $empEtBClr;

    /**
     * @ORM\Column(name="dEmpEtCTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtCTrk;

    /**
     * @ORM\Column(name="dEmpEtCMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtCMax;

    /**
     * @ORM\Column(name="bEmpEtCClr", type="boolean", nullable=true)
     * @var bool
     */
    private $empEtCClr;

    /**
     * @ORM\Column(name="dEmpEtDTrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtDTrk;

    /**
     * @ORM\Column(name="dEmpEtDMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtDMax;

    /**
     * @ORM\Column(name="bEmpEtDClr", type="boolean", nullable=true)
     * @var bool
     */
    private $empEtDClr;

    /**
     * @ORM\Column(name="dEmpEtETrk", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $empEtETrk;

    /**
     * @ORM\Column(name="dEmpEtEMax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dEmpEtEmax;

    /**
     * @ORM\Column(name="bEmpEtEClr", type="boolean", nullable=true)
     * @var bool
     */
    private $bEmpEtEClr;

    /**
     * @ORM\Column(name="dDefUDExpA", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dDefUDExpA;

    /**
     * @ORM\Column(name="dDefUDExpB", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dDefUDExpB;

    /**
     * @ORM\Column(name="dDefUDExpC", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dDefUDExpC;

    /**
     * @ORM\Column(name="dDefUDExpD", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dDefUDExpD;

    /**
     * @ORM\Column(name="dDefUDExpE", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $dDefUDExpE;

    /**
     * @ORM\Column(name="bCPPExempt", type="boolean", nullable=true)
     * @var bool
     */
    private $CppExempt;

    /**
     * @ORM\Column(name="lJobCatId", type="integer", nullable=true)
     * @var int
     */
    private $jobCatId;

    /**
     * @ORM\Column(name="nLangPref", type="smallint", nullable=true)
     * @var int
     */
    private $langPref;

    /**
     * @ORM\Column(name="lModVer", type="integer", nullable=true)
     * @var int
     */
    private $modVer;

    /**
     * @ORM\Column(name="sRPPRegNo", type="string", length=7, nullable=true)
     * @var string
     */
    private $rppRegNo;

    /**
     * @ORM\Column(name="sEmpCode", type="string", length=2, nullable=true)
     * @var string
     */
    private $empCode;

    /**
     * @ORM\Column(name="fPenAdj", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $penAdj;

    /**
     * @ORM\Column(name="nAdrProvCD", type="smallint", nullable=true)
     * @var int
     */
    private $adrProvCd;

    /**
     * @ORM\Column(name="lExpGrpId", type="integer", nullable=true)
     * @var int
     */
    private $expGrpId;

    /**
     * @ORM\Column(name="bQpipIns", type="boolean", nullable=true)
     * @var bool
     */
    private $qQipIns;

    /**
     * @ORM\Column(name="bVacOnVac", type="boolean", nullable=true)
     * @var bool
     */
    private $vacOnVac;

    /**
     * @ORM\Column(name="dAddQueTax", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $addQueTax;

    /**
     * @ORM\Column(name="sEmail", type="string", length=50, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="dFedNIndx", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $fedNIndx;

    /**
     * @ORM\Column(name="dProvNIndx", type="float", precision=10, scale=0, nullable=true)
     * @var float
     */
    private $provNIndx;

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
    public function getFedBase()
    {
        return $this->fedBase;
    }

    /**
     * @param float $fedBase
     * @return $this
     */
    public function setFedBase($fedBase)
    {
        $this->fedBase = $fedBase;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvBase()
    {
        return $this->provBase;
    }

    /**
     * @param float $provBase
     * @return $this
     */
    public function setProvBase($provBase)
    {
        $this->provBase = $provBase;
        return $this;
    }

    /**
     * @return float
     */
    public function getExtraTax()
    {
        return $this->extraTax;
    }

    /**
     * @param float $extraTax
     * @return $this
     */
    public function setExtraTax($extraTax)
    {
        $this->extraTax = $extraTax;
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
    public function isInsured()
    {
        return $this->isInsured;
    }

    /**
     * @param boolean $isInsured
     * @return $this
     */
    public function setIsInsured($isInsured)
    {
        $this->isInsured = $isInsured;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRetained()
    {
        return $this->isRetained;
    }

    /**
     * @param boolean $isRetained
     * @return $this
     */
    public function setIsRetained($isRetained)
    {
        $this->isRetained = $isRetained;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMemInTodo()
    {
        return $this->isMemInTodo;
    }

    /**
     * @param boolean $isMemInTodo
     * @return $this
     */
    public function setIsMemInTodo($isMemInTodo)
    {
        $this->isMemInTodo = $isMemInTodo;
        return $this;
    }

    /**
     * @return int
     */
    public function getPayPeriod()
    {
        return $this->payPeriod;
    }

    /**
     * @param int $payPeriod
     * @return $this
     */
    public function setPayPeriod($payPeriod)
    {
        $this->payPeriod = $payPeriod;
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
    public function getFedIndex()
    {
        return $this->fedIndex;
    }

    /**
     * @param float $fedIndex
     * @return $this
     */
    public function setFedIndex($fedIndex)
    {
        $this->fedIndex = $fedIndex;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvIndex()
    {
        return $this->provIndex;
    }

    /**
     * @param float $provIndex
     * @return $this
     */
    public function setProvIndex($provIndex)
    {
        $this->provIndex = $provIndex;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWageExpired()
    {
        return $this->isWageExpired;
    }

    /**
     * @param boolean $isWageExpired
     * @return $this
     */
    public function setIsWageExpired($isWageExpired)
    {
        $this->isWageExpired = $isWageExpired;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsAcWageExpired()
    {
        return $this->isAcWageExpired;
    }

    /**
     * @param int $isAcWageExpired
     * @return $this
     */
    public function setIsAcWageExpired($isAcWageExpired)
    {
        $this->isAcWageExpired = $isAcWageExpired;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTermDate()
    {
        return $this->termDate;
    }

    /**
     * @param DateTime $termDate
     * @return $this
     */
    public function setTermDate(DateTime $termDate)
    {
        $this->termDate = $termDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoeCode()
    {
        return $this->roeCode;
    }

    /**
     * @param string $roeCode
     * @return $this
     */
    public function setRoeCode($roeCode)
    {
        $this->roeCode = $roeCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getDpWageExp()
    {
        return $this->dpWageExp;
    }

    /**
     * @param int $dpWageExp
     * @return $this
     */
    public function setDpWageExp($dpWageExp)
    {
        $this->dpWageExp = $dpWageExp;
        return $this;
    }

    /**
     * @return int
     */
    public function getDfltDptId()
    {
        return $this->dfltDptId;
    }

    /**
     * @param int $dfltDptId
     * @return $this
     */
    public function setDfltDptId($dfltDptId)
    {
        $this->dfltDptId = $dfltDptId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompId()
    {
        return $this->compId;
    }

    /**
     * @param int $compId
     * @return $this
     */
    public function setCompId($compId)
    {
        $this->compId = $compId;
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
    public function getEmpEtHrs()
    {
        return $this->empEtHrs;
    }

    /**
     * @param float $empEtHrs
     * @return $this
     */
    public function setEmpEtHrs($empEtHrs)
    {
        $this->empEtHrs = $empEtHrs;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtATrk()
    {
        return $this->empEtATrk;
    }

    /**
     * @param float $empEtATrk
     * @return $this
     */
    public function setEmpEtATrk($empEtATrk)
    {
        $this->empEtATrk = $empEtATrk;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtAMax()
    {
        return $this->empEtAMax;
    }

    /**
     * @param float $empEtAMax
     * @return $this
     */
    public function setEmpEtAMax($empEtAMax)
    {
        $this->empEtAMax = $empEtAMax;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpEtAClr()
    {
        return $this->empEtAClr;
    }

    /**
     * @param boolean $empEtAClr
     * @return $this
     */
    public function setEmpEtAClr($empEtAClr)
    {
        $this->empEtAClr = $empEtAClr;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtBTrk()
    {
        return $this->empEtBTrk;
    }

    /**
     * @param float $empEtBTrk
     * @return $this
     */
    public function setEmpEtBTrk($empEtBTrk)
    {
        $this->empEtBTrk = $empEtBTrk;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtBMax()
    {
        return $this->empEtBMax;
    }

    /**
     * @param float $empEtBMax
     * @return $this
     */
    public function setEmpEtBMax($empEtBMax)
    {
        $this->empEtBMax = $empEtBMax;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpEtBClr()
    {
        return $this->empEtBClr;
    }

    /**
     * @param boolean $empEtBClr
     * @return $this
     */
    public function setEmpEtBClr($empEtBClr)
    {
        $this->empEtBClr = $empEtBClr;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtCTrk()
    {
        return $this->empEtCTrk;
    }

    /**
     * @param float $empEtCTrk
     * @return $this
     */
    public function setEmpEtCTrk($empEtCTrk)
    {
        $this->empEtCTrk = $empEtCTrk;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtCMax()
    {
        return $this->empEtCMax;
    }

    /**
     * @param float $empEtCMax
     * @return $this
     */
    public function setEmpEtCMax($empEtCMax)
    {
        $this->empEtCMax = $empEtCMax;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpEtCClr()
    {
        return $this->empEtCClr;
    }

    /**
     * @param boolean $empEtCClr
     * @return $this
     */
    public function setEmpEtCClr($empEtCClr)
    {
        $this->empEtCClr = $empEtCClr;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtDTrk()
    {
        return $this->empEtDTrk;
    }

    /**
     * @param float $empEtDTrk
     * @return $this
     */
    public function setEmpEtDTrk($empEtDTrk)
    {
        $this->empEtDTrk = $empEtDTrk;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtDMax()
    {
        return $this->empEtDMax;
    }

    /**
     * @param float $empEtDMax
     * @return $this
     */
    public function setEmpEtDMax($empEtDMax)
    {
        $this->empEtDMax = $empEtDMax;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpEtDClr()
    {
        return $this->empEtDClr;
    }

    /**
     * @param boolean $empEtDClr
     * @return $this
     */
    public function setEmpEtDClr($empEtDClr)
    {
        $this->empEtDClr = $empEtDClr;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmpEtETrk()
    {
        return $this->empEtETrk;
    }

    /**
     * @param float $empEtETrk
     * @return $this
     */
    public function setEmpEtETrk($empEtETrk)
    {
        $this->empEtETrk = $empEtETrk;
        return $this;
    }

    /**
     * @return float
     */
    public function getDEmpEtEmax()
    {
        return $this->dEmpEtEmax;
    }

    /**
     * @param float $dEmpEtEmax
     * @return $this
     */
    public function setDEmpEtEmax($dEmpEtEmax)
    {
        $this->dEmpEtEmax = $dEmpEtEmax;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBEmpEtEClr()
    {
        return $this->bEmpEtEClr;
    }

    /**
     * @param boolean $bEmpEtEClr
     * @return $this
     */
    public function setBEmpEtEClr($bEmpEtEClr)
    {
        $this->bEmpEtEClr = $bEmpEtEClr;
        return $this;
    }

    /**
     * @return float
     */
    public function getDDefUDExpA()
    {
        return $this->dDefUDExpA;
    }

    /**
     * @param float $dDefUDExpA
     * @return $this
     */
    public function setDDefUDExpA($dDefUDExpA)
    {
        $this->dDefUDExpA = $dDefUDExpA;
        return $this;
    }

    /**
     * @return float
     */
    public function getDDefUDExpB()
    {
        return $this->dDefUDExpB;
    }

    /**
     * @param float $dDefUDExpB
     * @return $this
     */
    public function setDDefUDExpB($dDefUDExpB)
    {
        $this->dDefUDExpB = $dDefUDExpB;
        return $this;
    }

    /**
     * @return float
     */
    public function getDDefUDExpC()
    {
        return $this->dDefUDExpC;
    }

    /**
     * @param float $dDefUDExpC
     * @return $this
     */
    public function setDDefUDExpC($dDefUDExpC)
    {
        $this->dDefUDExpC = $dDefUDExpC;
        return $this;
    }

    /**
     * @return float
     */
    public function getDDefUDExpD()
    {
        return $this->dDefUDExpD;
    }

    /**
     * @param float $dDefUDExpD
     * @return $this
     */
    public function setDDefUDExpD($dDefUDExpD)
    {
        $this->dDefUDExpD = $dDefUDExpD;
        return $this;
    }

    /**
     * @return float
     */
    public function getDDefUDExpE()
    {
        return $this->dDefUDExpE;
    }

    /**
     * @param float $dDefUDExpE
     * @return $this
     */
    public function setDDefUDExpE($dDefUDExpE)
    {
        $this->dDefUDExpE = $dDefUDExpE;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCppExempt()
    {
        return $this->CppExempt;
    }

    /**
     * @param boolean $CppExempt
     * @return $this
     */
    public function setCppExempt($CppExempt)
    {
        $this->CppExempt = $CppExempt;
        return $this;
    }

    /**
     * @return int
     */
    public function getJobCatId()
    {
        return $this->jobCatId;
    }

    /**
     * @param int $jobCatId
     * @return $this
     */
    public function setJobCatId($jobCatId)
    {
        $this->jobCatId = $jobCatId;
        return $this;
    }

    /**
     * @return int
     */
    public function getLangPref()
    {
        return $this->langPref;
    }

    /**
     * @param int $langPref
     * @return $this
     */
    public function setLangPref($langPref)
    {
        $this->langPref = $langPref;
        return $this;
    }

    /**
     * @return int
     */
    public function getModVer()
    {
        return $this->modVer;
    }

    /**
     * @param int $modVer
     * @return $this
     */
    public function setModVer($modVer)
    {
        $this->modVer = $modVer;
        return $this;
    }

    /**
     * @return string
     */
    public function getRppRegNo()
    {
        return $this->rppRegNo;
    }

    /**
     * @param string $rppRegNo
     * @return $this
     */
    public function setRppRegNo($rppRegNo)
    {
        $this->rppRegNo = $rppRegNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmpCode()
    {
        return $this->empCode;
    }

    /**
     * @param string $empCode
     * @return $this
     */
    public function setEmpCode($empCode)
    {
        $this->empCode = $empCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getPenAdj()
    {
        return $this->penAdj;
    }

    /**
     * @param float $penAdj
     * @return $this
     */
    public function setPenAdj($penAdj)
    {
        $this->penAdj = $penAdj;
        return $this;
    }

    /**
     * @return int
     */
    public function getAdrProvCd()
    {
        return $this->adrProvCd;
    }

    /**
     * @param int $adrProvCd
     * @return $this
     */
    public function setAdrProvCd($adrProvCd)
    {
        $this->adrProvCd = $adrProvCd;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpGrpId()
    {
        return $this->expGrpId;
    }

    /**
     * @param int $expGrpId
     * @return $this
     */
    public function setExpGrpId($expGrpId)
    {
        $this->expGrpId = $expGrpId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isQQipIns()
    {
        return $this->qQipIns;
    }

    /**
     * @param boolean $qQipIns
     * @return $this
     */
    public function setQQipIns($qQipIns)
    {
        $this->qQipIns = $qQipIns;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVacOnVac()
    {
        return $this->vacOnVac;
    }

    /**
     * @param boolean $vacOnVac
     * @return $this
     */
    public function setVacOnVac($vacOnVac)
    {
        $this->vacOnVac = $vacOnVac;
        return $this;
    }

    /**
     * @return float
     */
    public function getAddQueTax()
    {
        return $this->addQueTax;
    }

    /**
     * @param float $addQueTax
     * @return $this
     */
    public function setAddQueTax($addQueTax)
    {
        $this->addQueTax = $addQueTax;
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
    public function getFedNIndx()
    {
        return $this->fedNIndx;
    }

    /**
     * @param float $fedNIndx
     * @return $this
     */
    public function setFedNIndx($fedNIndx)
    {
        $this->fedNIndx = $fedNIndx;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvNIndx()
    {
        return $this->provNIndx;
    }

    /**
     * @param float $provNIndx
     * @return $this
     */
    public function setProvNIndx($provNIndx)
    {
        $this->provNIndx = $provNIndx;
        return $this;
    }
}
