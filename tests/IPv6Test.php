<?php
declare(strict_types = 1);

namespace Tests\Innmind\IP;

use Innmind\IP\{
    IPv6,
    IP,
    Exception\AddressNotMatchingIPv6Format,
};
use PHPUnit\Framework\TestCase;

class IPv6Test extends TestCase
{
    /**
     * @dataProvider addresses
     */
    public function testInterface($address)
    {
        $this->assertInstanceOf(IP::class, IPv6::of($address));
        $this->assertSame($address, IPv6::of($address)->toString());
    }

    public function testEquals()
    {
        $this->assertTrue(IPv6::of('::1')->equals(IPv6::of('::1')));
        $this->assertFalse(IPv6::of('::1')->equals(IPv6::of('::2')));
    }

    public function testLocalhost()
    {
        $ip = IPv6::localhost();

        $this->assertInstanceOf(IPv6::class, $ip);
        $this->assertTrue($ip->equals(IPv6::of('::1')));
    }

    public function testThrowWhenInvalidFormat()
    {
        $this->expectException(AddressNotMatchingIPv6Format::class);
        $this->expectExceptionMessage('localhost');

        IPv6::of('localhost');
    }

    public function testThrowWhenOutOfBound()
    {
        $this->expectException(AddressNotMatchingIPv6Format::class);
        $this->expectExceptionMessage('::z');

        IPv6::of('::z');
    }

    public function addresses(): array
    {
        return [
            ['0:0:0:0:0:0:0:1'],
            ['0:0:0:0:0:0:9999:9999'],
            ['0:0:0:0:0:9999:9999:9999'],
            ['0:0:0:0:9999:9999:9999:9999'],
            ['0:0:0:9999:9999:9999:9999:9999'],
            ['0:0:0:9999:9999:9999:9999:9999'],
            ['0:0:9999:9999:9999:9999:9999:9999'],
            ['0:9999:9999:9999:9999:9999:9999:9999'],
            ['9999:9999:9999:9999:9999:9999:9999:9999'],
            ['0:0:0:0:0:0:0:f'],
            ['0:0:0:0:0:0:f:f'],
            ['0:0:0:0:0:f:f:f'],
            ['0:0:0:0:f:f:f:f'],
            ['0:0:0:f:f:f:f:f'],
            ['0:0:0:f:f:f:f:f'],
            ['0:0:f:f:f:f:f:f'],
            ['0:f:f:f:f:f:f:f'],
            ['f:f:f:f:f:f:f:f'],
            ['0:0:0:0:0:0:0:ffff'],
            ['0:0:0:0:0:0:ffff:ffff'],
            ['0:0:0:0:0:ffff:ffff:ffff'],
            ['0:0:0:0:ffff:ffff:ffff:ffff'],
            ['0:0:0:ffff:ffff:ffff:ffff:ffff'],
            ['0:0:0:ffff:ffff:ffff:ffff:ffff'],
            ['0:0:ffff:ffff:ffff:ffff:ffff:ffff'],
            ['0:ffff:ffff:ffff:ffff:ffff:ffff:ffff'],
            ['ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff'],
            ['::1'],
            ['2001:db8:a0b:12f0::1'],
        ];
    }
}
