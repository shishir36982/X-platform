<?php
declare(strict_types=1);

namespace LanguageDetector\Tokenizer;

/**
 * Interface ITokenizer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package Tokenizer
 */
interface TokenizerInterface
{
    /**
     * @param string $str
     * @return array
     */
    public function tokenize(string $str): array;
}
