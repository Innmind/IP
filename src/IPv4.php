<?php
declare(strict_types = 1);

namespace Innmind\IP;

use Innmind\Immutable\{
    Maybe,
    Attempt,
};

/**
 * @psalm-immutable
 */
final class IPv4 extends IP
{
    /**
     * @psalm-pure
     */
    public static function of(string $address): self
    {
        return IP::v4($address);
    }

    /**
     * @psalm-pure
     */
    public static function localhost(): self
    {
        return self::of('127.0.0.1');
    }

    /**
     * @psalm-pure
     *
     * @return Maybe<self>
     */
    public static function maybe(string $address): Maybe
    {
        return self::attempt($address)->maybe();
    }

    /**
     * @psalm-pure
     *
     * @return Attempt<self>
     */
    public static function attempt(string $address): Attempt
    {
        return Attempt::of(static fn() => self::of($address));
    }
}
