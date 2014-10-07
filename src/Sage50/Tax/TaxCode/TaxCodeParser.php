<?php
namespace Sinergi\Sage50\Tax\TaxCode;

use Sinergi\Sage50\Tax\TaxCollection;
use Sinergi\Sage50\Tax\TaxEntity;

class TaxCodeParser
{
    const COMPOUND_STRING = 'included';

    /**
     * @param TaxCodeEntity $taxCode
     * @return TaxCollection
     */
    public function parseTaxCode(TaxCodeEntity $taxCode)
    {
        $taxes = new TaxCollection();
        $description = $taxCode->getDescriptionEnglish();

        $remainingDescription = null;
        if (substr(strrev($description), 0, 1) !== '%') {
            $remainingDescription = explode('%', strrev($description), 2);
            $remainingDescription = strrev($remainingDescription[0]);
        }

        preg_match_all("/([^%]*%)/", $description, $matches);
        if (is_array($matches[0])) {
            foreach ($matches[0] as $key => $part) {
                $taxArray = $this->parseTaxCodePart(
                    $part,
                    (isset($matches[0][$key + 1]) ? $matches[0][$key + 1] : $remainingDescription)
                );
                if ($taxArray) {
                    $tax = new TaxEntity();
                    $tax->setTaxCode($taxCode);
                    $tax->setName($taxArray['name']);
                    $tax->setRate($taxArray['rate']);
                    $tax->setIsCompound($taxArray['isCompound']);
                    $taxes->add($tax);
                }
            }
        }

        return $taxes;
    }

    /**
     * @param string $taxCodePart
     * @param null|string $nextTaxCodePart
     * @return array|null
     */
    private function parseTaxCodePart($taxCodePart, $nextTaxCodePart = null)
    {
        $isCompound = $this->checkIfPreviousPartIsCompound($nextTaxCodePart);

        preg_match("/([\\w]*)[ @]* ([\\d\\.]*)%/", $taxCodePart, $parts);
        if (isset($parts[1]) && isset($parts[2])) {
            $name = trim($parts[1]);
            $rate = bcdiv(trim($parts[2]), 100, 5);

            return [
                'name' => $name,
                'rate' => $rate,
                'isCompound' => $isCompound
            ];
        }

        return null;
    }

    /**
     * @param string $nextTaxCodePart
     * @return boolean
     */
    private function checkIfPreviousPartIsCompound($nextTaxCodePart)
    {
        if (strpos($nextTaxCodePart, '%') !== false) {
            return (boolean)preg_match("/.*" . self::COMPOUND_STRING . ".*%.*/", $nextTaxCodePart);
        }
        return stripos($nextTaxCodePart, self::COMPOUND_STRING) !== false;
    }
}
