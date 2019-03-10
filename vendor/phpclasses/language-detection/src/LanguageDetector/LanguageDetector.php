<?php
declare(strict_types=1);

namespace LanguageDetector;

use LanguageDetector\Tokenizer\TokenizerInterface;

/**
 * Class LanguageDetector
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 */
class LanguageDetector extends NGramParser
{
    /**
     * @var array
     */
    protected $tokens = [];

    /**
     * LanguageDetector constructor.
     *
     * @param TokenizerInterface|null $tokenizer
     */
    public function __construct(?TokenizerInterface $tokenizer = null)
    {
        parent::__construct($tokenizer);

        $content = file_get_contents(__DIR__ . '/../../etc/_langs.json');

        $this->tokens = json_decode($content, true);
    }

    /**
     * @param string $str
     * @return array|string A string in ISO-639-1 format otherwise an array if is not possible to detect the language
     */
    public function detect(string $str)
    {
        $samples = array_keys($this->getNgrams($str));

        $result = [];

        foreach ($this->tokens as $lang => $value)
        {
            $index = $sum = 0;

            foreach (array_slice($value, 0, count($samples)) as $k => $v)
            {
                if (!in_array($k, $samples))
                {
                    $sum += $this->getMaxNGrams();
                    $index++;
                    continue;
                }

                $sum += abs($index - array_search($k, $samples));
                $index++;
            }

            $result[$lang] = 1 - ($sum / ($this->getMaxNGrams() * $index));
        }

        arsort($result);

        $values = array_values($result);

        if (($values[0] - $values[1]) <= $this->getThreshold())
        {
            return $result;
        }

        return key($result);
    }
}
