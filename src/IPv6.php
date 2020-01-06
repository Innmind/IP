<?php
declare(strict_types = 1);

namespace Innmind\IP;

use Innmind\IP\Exception\AddressNotMatchingIPv6Format;

final class IPv6 implements IP
{
    private $address;

    public function __construct(string $address)
    {
        if (!\filter_var($address, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6)) {
            throw new AddressNotMatchingIPv6Format($address);
        }

        $this->address = $address;
    }

    public static function of(string $address): self
    {
        return new self($address);
    }

    public static function localhost(): self
    {
        return new self('::1');
    }

    public function equals(self $self): bool
    {
        return $this->address === $self->address;
    }

    public function toString(): string
    {
        return $this->address;
    }
}
