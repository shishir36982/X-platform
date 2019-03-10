<?php
declare(strict_types=1);

namespace LanguageDetector;

class TrainerTest extends \PHPUnit_Framework_TestCase
{
    public function testFilesAreReadable()
    {
        foreach (new \GlobIterator(__DIR__ . '/../etc/*.txt') as $file)
        {
            $this->assertIsReadable($file->getPathname());
        }
    }

    public function testFileIsWriteable()
    {
        $this->assertIsWritable(__DIR__ . '/../etc/_langs.json');
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMinLengthGreaterThanMaxLength()
    {
        $t = new Trainer();

        $t->setMinLength($t->getMaxLength() + 1);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMinLengthLessThanZero()
    {
        $t = new Trainer();

        $t->setMinLength(-42);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxLengthLessThanMinLength()
    {
        $t = new Trainer();

        $t->setMaxLength($t->getMinLength() - 1);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxNGramsEqualToZero()
    {
        $t = new Trainer();

        $t->setMaxNGrams(0);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxNGramsLessThanZero()
    {
        $t = new Trainer();

        $t->setMaxNGrams(-2);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsThresholdGreaterThanOne()
    {
        $t = new Trainer();

        $t->setThreshold(2);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsThresholdLessThanZero()
    {
        $t = new Trainer();

        $t->setThreshold(-1);
    }
}
