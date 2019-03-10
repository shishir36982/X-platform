<?php
declare(strict_types=1);

namespace LanguageDetector;

class NGramParserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTokensWithMaxLengthTwo()
    {
        $n = new NGramParser();

        $n->setMaxLength(2);

        $this->assertEquals(
            ['p', '_p', 'ph', 'hp', 'pu', 'un', 'ni', 'it', 't_', 'h', 'u', 'n', 'i', 't'],
            array_keys($n->getNgrams('PHPUnit'))
        );
    }

    public function testGetTokensWithMaxLengthOne()
    {
        $n = new NGramParser();

        $n->setMaxLength(1);

        $this->assertEquals(
            ['a', 'g', 'l', 'n', 'u', 'e'],
            array_keys($n->getNgrams('LaNgUaGe'))
        );
    }
}
