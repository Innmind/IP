<?php
declare(strict_types = 1);

namespace Innmind\IP;

use Innmind\IP\Exception\AddressNotMatchingIPv4Format;

final class IPv4 implements IP
{
    private string $address;

    private function __construct(string $address)
    {
        if (!\filter_var($address, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4)) {
            throw new AddressNotMatchingIPv4Format($address);
        }

        $this->address = $address;
    }

    public static function of(string $address): self
    {
        return new self($address);
    }

    public static function localhost(): self
    {
        return new self('127.0.0.1');
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
