<?php
declare(strict_types = 1);

namespace Tests\Innmind\IP;

use Innmind\IP\{
    IPv4,
    IP,
    Exception\DomainException,
};
use PHPUnit\Framework\TestCase;

class IPv4Test extends TestCase
{
    /**
     * @dataProvider addresses
     */
    public function testInterface($address)
    {
        $this->assertInstanceOf(IP::class, IPv4::of($address));
        $this->assertSame($address, IPv4::of($address)->toString());
        $this->assertSame($address, IPv4::maybe($address)->match(
            static fn($ip) => $ip->toString(),
            static fn() => null,
        ));
    }

    public function testEquals()
    {
        $this->assertTrue(IPv4::of('127.0.0.1')->equals(IPv4::of('127.0.0.1')));
        $this->assertTrue(IP::v4('127.0.0.1')->equals(IPv4::of('127.0.0.1')));
        $this->assertFalse(IPv4::of('127.0.0.1')->equals(IPv4::of('127.0.0.2')));
    }

    public function testLocalhost()
    {
        $ip = IPv4::localhost();

        $this->assertInstanceOf(IPv4::class, $ip);
        $this->assertTrue($ip->equals(IPv4::of('127.0.0.1')));
    }

    public function testThrowWhenInvalidFormat()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('localhost');

        IPv4::of('localhost');
    }

    public function testThrowWhenOutOfBound()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('256.0.0.1');

        IPv4::of('256.0.0.1');
    }

    public function testMaybeReturnNothingForInvalidAddress()
    {
        $this->assertNull(IPv4::maybe('localhost')->match(
            static fn($ip) => $ip->toString(),
            static fn() => null,
        ));
    }

    public function addresses(): array
    {
        return [
            ['0.0.0.0'],
            ['0.0.0.1'],
            ['0.0.0.10'],
            ['0.0.0.100'],
            ['0.0.0.200'],
            ['0.0.0.255'],
            ['127.0.0.1'],
            ['0.0.1.1'],
            ['0.0.10.10'],
            ['0.0.100.100'],
            ['0.0.200.200'],
            ['0.0.255.255'],
            ['0.1.1.1'],
            ['0.10.10.10'],
            ['0.100.100.100'],
            ['0.200.200.200'],
            ['0.255.255.255'],
            ['1.1.1.1'],
            ['10.10.10.10'],
            ['100.100.100.100'],
            ['200.200.200.200'],
            ['255.255.255.255'],
        ];
    }
}
