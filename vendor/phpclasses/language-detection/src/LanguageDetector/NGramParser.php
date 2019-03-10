<?php
declare(strict_types=1);

namespace LanguageDetector;

use LanguageDetector\Tokenizer\{Tokenizer, TokenizerInterface};

/**
 * Class NGram
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 */
class NGramParser extends Tokenizer
{
    /**
     * @var int
     */
    private $minLength = 1;

    /**
     * @var int
     */
    private $maxLength = 4;

    /**
     * @var int
     */
    protected $maxNGrams = 350;

    /**
     * @var float
     */
    protected $threshold = .025;

    /**
     * NGramParser constructor.
     *
     * @param TokenizerInterface|null $tokenizer
     */
    public function __construct(?TokenizerInterface $tokenizer = null)
    {
        parent::__construct($tokenizer);
    }

    /**
     * Sets the min length of a N-gram
     *
     * @param int $minLength
     * @throws \LogicException if $minLength is greater than $this->maxLength
     */
    public function setMinLength(int $minLength)
    {
        if($minLength <= 0 || $minLength > $this->maxLength) {
            throw new \LogicException('$minLength must be less than or equal to $this->maxLength');
        }

        $this->minLength = $minLength;
    }

    /**
     * Sets the max length of a N-gram
     *
     * @param int $maxLength
     * @throws \LogicException if $maxLength is less than $this->minLength
     */
    public function setMaxLength(int $maxLength)
    {
        if($maxLength < $this->minLength) {
            throw new \LogicException('$maxLength must be greater than or equal to $this->minLength');
        }

        $this->maxLength = $maxLength;
    }

    /**
     * Sets the max number of N-grams which should used for detection
     *
     * @param int $maxNGrams
     * @throws \LogicException if $maxNgrams is less than or equal to zero
     */
    public function setMaxNGrams(int $maxNGrams)
    {
        if($maxNGrams <= 0) {
            throw new \LogicException('$maxNGrams must be greater than zero');
        }

        $this->maxNGrams = $maxNGrams;
    }

    /**
     * Sets the threshold which is needed to decide if a language is detected right or not
     *
     * @param float $threshold
     * @throws \LogicException if $threshold is less than zero or greater than one
     */
    public function setThreshold(float $threshold)
    {
        if($threshold < 0 || $threshold > 1) {
            throw new \LogicException('$threshold must be greater than zero and less than one');
        }

        $this->threshold = $threshold;
    }

    /**
     * Returns the min length of a N-gram
     *
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * Returns the max length of a N-gram
     *
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * Returns the max number of N-grams
     *
     * @return int
     */
    public function getMaxNGrams(): int
    {
        return $this->maxNGrams;
    }

    /**
     * Returns the threshold
     *
     * @return float
     */
    public function getThreshold(): float
    {
        return $this->threshold;
    }

    /**
     * Tokenized the string into N-grams calculated the frequencies and sorted them in descending order
     *
     * @param string $str
     * @return array
     */
    public function getNgrams(string $str): array
    {
        $tokens = [];

        $str = mb_strtolower($str);

        foreach ($this->tokenize($str) as $word)
        {
            $length = mb_strlen($word);

            for ($i = $this->minLength; $i <= $this->maxLength; $i++)
            {
                for ($j = 0; ($j + $i - 1) < $length; $j++)
                {
                    $tokens[$i][] = mb_substr($word, $j, $i);
                }
            }
        }

        foreach ($tokens as &$ngram)
        {
            $ngram = array_count_values($ngram);

            $sum = array_sum($ngram);

            $ngram = array_map(function ($number) use (&$sum) {
                return $number / $sum;
            }, $ngram);
        }

        $tokens = array_merge(...$tokens);

        unset($tokens['_']);

        arsort($tokens);

        return array_slice($tokens, 0, $this->maxNGrams);
    }
}
