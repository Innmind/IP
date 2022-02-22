<?php
declare(strict_types = 1);

namespace Innmind\IP;

final class IPv4 extends IP
{
    public static function of(string $address): self
    {
        return IP::v4($address);
    }

    public static function localhost(): self
    {
        return self::of('127.0.0.1');
    }
}
