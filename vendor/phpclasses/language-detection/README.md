language_detection
=
[![Build Status](https://travis-ci.org/patrick-schur/language_detection.svg?branch=master)](https://travis-ci.org/patrick-schur/language_detection)
[![Version](https://img.shields.io/packagist/v/patrick-schur/language-detection.svg?style=flat-square)](https://packagist.org/packages/patrick-schur/language-detection)
[![Total Downloads](https://img.shields.io/packagist/dt/patrick-schur/language-detection.svg?style=flat-square)](https://packagist.org/packages/patrick-schur/language-detection)
[![Maintenance](https://img.shields.io/maintenance/yes/2016.svg?style=flat-square)](https://github.com/patrick-schur/language_detection)
[![License](https://img.shields.io/packagist/l/patrick-schur/language-detection.svg?style=flat-square)](https://opensource.org/licenses/MIT)

Detect the language from a given text.
To do that it generates a language profile based on [N-grams](https://en.wikipedia.org/wiki/N-gram) for every file in `etc` directory.
Then it generate such language profile for the unknown text and compare the previosly language profiles against the unknown.

Requirements:
-
Only requirement is a PHP version greater than or equal to 7.1.
> **Note:** language_detection requires the [Multibyte String](http://php.net/manual/en/book.mbstring.php) extension in order to work. 

Install via Composer
-
```text
composer require patrick-schur/language-detection
```
Or add the following to `composer.json`
```json
{
  "require": {
     "patrick-schur/language-detection": "*"
  }
}
```

Basic Usage
-

Before we can recognize the language from a given text, we have to generate a language profile for each language.
From the beginning it comes with a pre-trained language profile ([`etc/_langs.json`](etc/_langs.json)).<br>
Also you can add new files to [`etc`](etc) or change existing ones.

First we have to generate a language profile.
 
```php
require_once 'vendor/autoload.php';
 
use LanguageDetector\Trainer;
 
$t = new Trainer;
 
$t->learn();
```

If we have our language profile, we can classify texts by their language.
To detect the language correctly, the length of the input text should be at least some sentences.
 
```php
require_once 'vendor/autoload.php';
 
use LanguageDetector\LanguageDetector;
 
$ld = new LanguageDetector;
 
var_dump($ld->detect('Das ist ein deutscher Satz.')); // de
```
 
Supported languages:
-

It supports up to now 73 languages.
If your language not supported, feel free to add your own language files.

- ab (abkhaz)
- af (afrikaans)
- am (amharic)
- ar (arabic)
- az (azerbaijani)
- be (belarusian)
- bg (bulgarian)
- bn (bengali)
- co (corsican)
- cs (czech)
- cy (welsh)
- de (german)
- dk (danish)
- el (greek)
- en (english)
- eo (esperanto)
- es (spanish)
- et (estonian)
- eu (basque)
- fa (persian)
- fi (finnish)
- fj (fijian)
- fo (faroese)
- fr (french)
- ga (irish)
- gd (scottish)
- gl (galician)
- gn (guarani)
- ha (hausa)
- he (hebrew)
- hi (hindi)
- hr (croatian)
- hu (hungarian)
- hy (armenian)
- ia (interlingua)
- ig (igbo)
- io (ido)
- is (icelandic)
- it (italian)
- iu (inuktitut)
- jp (japanese)
- jv (javanese)
- ka (georgian)
- ko (korean)
- ku (kurdish)
- la (latin)
- lg (ganda)
- lo (lao)
- lt (lithuanian)
- lv (latvian)
- mh (marshallese)
- mn (mongolian)
- ms (malay)
- mt (maltese)
- nl (dutch)
- no (norwegian)
- nv (navajo)
- pl (polish)
- pt (portuguese)
- ro (romanian)
- ru (russian)
- sk (slovak)
- sl (slovene)
- so (somali)
- sv (swedish)
- th (thai)
- tr (turkish)
- ty (tahitian)
- ug (uyghur)
- uk (ukrainian)
- uz (uzbek)
- vi (vietnamese)
- zh (chinese)
