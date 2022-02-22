<?php
declare(strict_types = 1);

namespace Innmind\IP;

use Innmind\IP\Exception\DomainException;

abstract class IP
{
    /** @var non-empty-string */
    private string $address;

    /**
     * @param non-empty-string $address
     */
    final private function __construct(string $address)
    {
        $this->address = $address;
    }

    final public static function v4(string $address): IPv4
    {
        if (!\filter_var($address, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4)) {
            throw new DomainException($address);
        }

        /** @psalm-suppress ArgumentTypeCoercion $address cannot be empty here */
        return new IPv4($address);
    }

    final public static function v6(string $address): IPv6
    {
        if (!\filter_var($address, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6)) {
            throw new DomainException($address);
        }

        /** @psalm-suppress ArgumentTypeCoercion $address cannot be empty here */
        return new IPv6($address);
    }

    final public function equals(self $self): bool
    {
        return $this->address === $self->address;
    }

    /**
     * @return non-empty-string
     */
    final public function toString(): string
    {
        return $this->address;
    }
}
