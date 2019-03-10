# Chinese Master

Processes Chinese text.

## Usage

*Is string using traditional Chinese script?*

```php
use peterkahl\ChineseMaster\ChineseMaster;

if (ChineseMaster::isTraditional('繁體字')) {
  echo 'traditional';
}
else {
  echo 'simplified';
}

# traditional
```

*Convert traditional to simplified*

```php
use peterkahl\ChineseMaster\ChineseMaster;

echo ChineseMaster::trad2simp('灣龍爾'); # 湾龙尔
```

*Convert simplified to traditional*

```php
use peterkahl\ChineseMaster\ChineseMaster;

echo ChineseMaster::simp2trad('湾龙尔'); # 灣龍爾
```
