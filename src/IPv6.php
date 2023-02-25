<?php
declare(strict_types = 1);

namespace Innmind\IP;

use Innmind\IP\Exception\DomainException;
use Innmind\Immutable\Maybe;

/**
 * @psalm-immutable
 */
final class IPv6 extends IP
{
    /**
     * @psalm-pure
     */
    public static function of(string $address): self
    {
        return IP::v6($address);
    }

    /**
     * @psalm-pure
     */
    public static function localhost(): self
    {
        return self::of('::1');
    }

    /**
     * @psalm-pure
     *
     * @return Maybe<self>
     */
    public static function maybe(string $address): Maybe
    {
        try {
            return Maybe::just(self::of($address));
        } catch (DomainException $e) {
            /** @var Maybe<self> */
            return Maybe::nothing();
        }
    }
}
