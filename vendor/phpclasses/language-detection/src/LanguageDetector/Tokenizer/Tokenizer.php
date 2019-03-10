<?php
declare(strict_types=1);

namespace LanguageDetector\Tokenizer;

/**
 * Class Tokenizer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package Tokenizer
 */
class Tokenizer implements TokenizerInterface
{
    /**
     * @var TokenizerInterface
     */
    private $tokenizer;

    /**
     * Tokenizer constructor.
     *
     * @param TokenizerInterface $tokenizer
     */
    public function __construct(?TokenizerInterface $tokenizer = null)
    {
        if(null === $tokenizer)
        {
            $tokenizer = new WordTokenizer();
        }

        $this->tokenizer = $tokenizer;
    }

    /**
     * Add an underscore to each word at the beginning and end to improve the speech recognition
     *
     * @param string $str
     * @return array
     */
    public function tokenize(string $str): array
    {
        $underscore = function (&$word) {
            return '_'. $word .'_';
        };

        return array_map($underscore, $this->tokenizer->tokenize($str));
    }
}
