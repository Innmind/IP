# IP

| `master` | `develop` |
|----------|-----------|
| [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Innmind/IP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Innmind/IP/?branch=master) | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Innmind/IP/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Innmind/IP/?branch=develop) |
| [![Code Coverage](https://scrutinizer-ci.com/g/Innmind/IP/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Innmind/IP/?branch=master) | [![Code Coverage](https://scrutinizer-ci.com/g/Innmind/IP/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/Innmind/IP/?branch=develop) |
| [![Build Status](https://scrutinizer-ci.com/g/Innmind/IP/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Innmind/IP/build-status/master) | [![Build Status](https://scrutinizer-ci.com/g/Innmind/IP/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/Innmind/IP/build-status/develop) |

IP value objects

## Installation

```sh
require innmind/ip
```

## Usage

```php
use Innmind\IP\{
    IPv4,
    IPv6
};

$ipv4 = new IPv4('192.168.0.1');
$ipv6 = new IPv6('2001:db8:a0b:12f0::1');
new IPv4('localhost'); //throws AddressNotMatchingIPv4Format
new IPv6('localhost'); //throws AddressNotMatchingIPv6Format
```
