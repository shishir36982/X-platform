# Charset From String

Identifies predominant script (charset, language) in a string. This library is capable of identifying:

<pre>
Arabic
Armenian
Bengali
Burmese
CJK
Cyrillic
Devanagari
Georgian
Greek
Gujarati
Hebrew
Japanese
Khmer
Korean
Lao
Latin
Malayalam
Sinhala
Tamil
Thai
Tibetan
</pre>

## Usage

```php
use peterkahl\CharsetFromString\CharsetFromString;

echo CharsetFromString::getCharset('في نهاية المطاف'); # ARABIC

echo CharsetFromString::getCharset('דיכוי העם הפלסטיני'); # HEBREW

echo CharsetFromString::getCharset('Прекратить притеснение тибетского народа'); # CYRILLIC

echo CharsetFromString::getCharset('impeach Trump'); # LATIN

echo CharsetFromString::getCharset('팔레스타인 국민의 마지막 억압'); # KOREAN

echo CharsetFromString::getCharset('チベット人の最後の抑圧'); # JAPANESE

echo CharsetFromString::getCharset('终于压迫西藏人民'); # CJK

echo CharsetFromString::getCharset('การกดขี่ข่มเหงของชาวทิเบต'); # THAI

echo CharsetFromString::getCharset('ຢຸດການກົດຂີ່ຂອງປະຊາຊົນທິເບດ'); # LAO

echo CharsetFromString::getCharset('បញ្ឈប់ការគាបសង្កត់របស់ប្រជាជនទីបេ'); # KHMER

echo CharsetFromString::getCharset('གྲུབ་དབང་རྫོགས་ཆེན་པའི་བསྟན་པ་རྒྱས་པའི་སྨོན་ལམ་རྒྱལ་བ་དགྱེས་པའི་མཆོད་སྤྲིན།'); # TIBETAN

echo CharsetFromString::getCharset('Σταματήστε την καταπίεση του θιβετιανού λαού'); # GREEK
```
