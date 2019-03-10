<?php
declare(strict_types=1);

namespace LanguageDetector\Tokenizer;

/**
 * Class WordTokenizer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package Tokenizer
 */
class WordTokenizer implements TokenizerInterface
{
    /**
     * Returns an array containing all founded words
     *
     * @param string $str
     * @return array
     */
    public function tokenize(string $str): array
    {
        return preg_split('/[^\pL]+/u', $str, -1, PREG_SPLIT_NO_EMPTY);
    }
}
