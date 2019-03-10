<?php
declare(strict_types=1);

namespace LanguageDetector;

class LanguageDetectorTest extends \PHPUnit_Framework_TestCase
{
    public function testDetectAllLanguages()
    {
        $l = new LanguageDetector();

        foreach (new \GlobIterator(__DIR__ . '/../etc/*.txt') as $file)
        {
            $content = file_get_contents($file->getPathname());

            $this->assertEquals($l->detect($content), $file->getBasename('.txt'));
        }
    }

    /**
     * @param $expected
     * @param $sample
     * @dataProvider sampleProvider
     */
    public function testDetectSamples(string $expected, string $sample)
    {
        $l = new LanguageDetector();

        $this->assertEquals($expected, $l->detect($sample));
    }

    /**
     * @return array
     */
    public function sampleProvider()
    {
        return [
            ['de', 'Ich wünsche dir noch einen schönen Tag'],
            ['jp', '最近どうですか。'],
            ['en', 'This sentences should be too small to be recognized.'],
            ['nl', 'Mag het een onsje meer zijn? '],
            ['hi', 'मुझे हिंदी नहीं आती'],
            ['et', 'Tere tulemast tagasi! Nägemist!'],
            ['pl', 'Wszystkiego najlepszego z okazji urodzin!'],
            ['pl', 'Czy mówi pan po polsku?'],
            ['fr', 'Où sont les toilettes?'],
            ['zh', '祝你美好的一天'],
        ];
    }
}
