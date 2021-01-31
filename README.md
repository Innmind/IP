# IP

[![Build Status](https://github.com/innmind/IP/workflows/CI/badge.svg?branch=master)](https://github.com/innmind/IP/actions?query=workflow%3ACI)
[![codecov](https://codecov.io/gh/innmind/IP/branch/develop/graph/badge.svg)](https://codecov.io/gh/innmind/IP)
[![Type Coverage](https://shepherd.dev/github/innmind/IP/coverage.svg)](https://shepherd.dev/github/innmind/IP)

IP value objects

## Installation

```sh
require innmind/ip
```

## Usage

```php
use Innmind\IP\{
    IPv4,
    IPv6,
};

$ipv4 = IPv4::of('192.168.0.1');
$ipv6 = IPv6::of('2001:db8:a0b:12f0::1');
IPv4::of('localhost'); //throws AddressNotMatchingIPv4Format
IPv6::of('localhost'); //throws AddressNotMatchingIPv6Format
```
