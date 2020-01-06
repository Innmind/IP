# IP

| `develop` |
|-----------|
| [![codecov](https://codecov.io/gh/Innmind/IP/branch/develop/graph/badge.svg)](https://codecov.io/gh/Innmind/IP) |
| [![Build Status](https://github.com/Innmind/IP/workflows/CI/badge.svg)](https://github.com/Innmind/IP/actions?query=workflow%3ACI) |

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
