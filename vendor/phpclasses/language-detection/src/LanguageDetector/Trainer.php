<?php
declare(strict_types=1);

namespace LanguageDetector;

use LanguageDetector\Tokenizer\TokenizerInterface;

/**
 * Class Trainer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 */
class Trainer extends NGramParser
{
    /**
     * Trainer constructor.
     *
     * @param TokenizerInterface|null $tokenizer
     */
    public function __construct(?TokenizerInterface $tokenizer = null)
    {
        parent::__construct($tokenizer);
    }

    /**
     * @return void
     */
    public function learn(): void
    {
        $tokens = [];

        foreach (new \GlobIterator(__DIR__ . '/../../etc/*.txt') as $file)
        {
            $content = file_get_contents($file->getPathname());

            echo $file->getBasename('.txt'), PHP_EOL;

            $tokens[$file->getBasename('.txt')] = $this->getNgrams($content);
        }

        file_put_contents(__DIR__ . '/../../etc/_langs.json', json_encode($tokens, JSON_UNESCAPED_UNICODE));
    }
}
