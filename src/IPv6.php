<?php
declare(strict_types = 1);

namespace Innmind\IP;

final class IPv6 extends IP
{
    public static function of(string $address): self
    {
        return IP::v6($address);
    }

    public static function localhost(): self
    {
        return self::of('::1');
    }
}
