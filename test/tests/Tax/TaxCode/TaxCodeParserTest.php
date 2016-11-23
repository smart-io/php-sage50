<?php

namespace Smart\Sage50\Tests\Tax\TaxCode;

use PHPUnit_Framework_TestCase;
use Smart\Sage50\Tax\TaxCode\TaxCodeEntity;
use Smart\Sage50\Tax\TaxCode\TaxCodeParser;
use Smart\Sage50\Tax\TaxEntity;

class TaxCodeParserTest extends PHPUnit_Framework_TestCase
{
    public function getTaxCodesAndExpectedResults()
    {
        return [[
            'taxCodes' => [
                'No Tax' => [],
                'GST @ 5%; QST @ 7.5%' => [['GST', '0.05'], ['QST', '0.075']],
                'GST @ 5%; QST @ 8.5%' => [['GST', '0.05'], ['QST', '0.085']],
                'GST @ 5%; QST @ 9.5%' => [['GST', '0.05'], ['QST', '0.095']],
                'GST @ 5%; QST @ 9.75%' => [['GST', '0.05'], ['QST', '0.0975']],
                'GST @ 5%, included; QST @ 7.5%, included' => [['GST', '0.05', true], ['QST', '0.075', true]],
                'GST @ 5%, included; QST @ 8.5%, included' => [['GST', '0.05', true], ['QST', '0.085', true]],
                'GST @ 5%, included; QST @ 9.5%, included' => [['GST', '0.05', true], ['QST', '0.095', true]],
                'HST @ 13%' => [['HST', '0.13']],
                'HST @ 13%, included' => [['HST', '0.13', true]],
                'HST @ 12%' => [['HST', '0.12']],
                'GST @ 5%' => [['GST', '0.05']],
                'HST @ 12%, included' => [['HST', '0.12', true]],
                'HST @ 15%' => [['HST', '0.15']],
                'HST @ 15%, included' => [['HST', '0.15', true]],
                'GST @ 5%, included' => [['GST', '0.05', true]],
                'GST 5%, QST 9.975%' => [['GST', '0.05'], ['QST', '0.09975']],
                'QST 9.975%' => [['QST', '0.09975']],
            ]
        ]];
    }

    /**
     * @dataProvider getTaxCodesAndExpectedResults
     * @param array $taxCodes
     */
    public function testTaxCodeParser(array $taxCodes)
    {
        $taxCodeParser = new TaxCodeParser();
        foreach ($taxCodes as $taxCodeString => $expectedResults) {
            $taxCode = new TaxCodeEntity();
            $taxCode->setDescriptionEnglish($taxCodeString);
            $results = $taxCodeParser->parseTaxCode($taxCode);
            $this->assertCount(count($expectedResults), $results);
            if (count($expectedResults)) {
                foreach ($expectedResults as $key => $expectedResult) {
                    /** @var TaxEntity $result */
                    $result = $results[$key];
                    $this->assertEquals($expectedResult[0], $result->getName());
                    $this->assertEquals($expectedResult[1], $result->getRate());
                    if (isset($expectedResult[2])) {
                        $this->assertEquals($expectedResult[2], $result->isCompound());
                    } else {
                        $this->assertFalse($result->isCompound());
                    }
                }
            }
        }
    }
}
