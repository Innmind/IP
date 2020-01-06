<?php
declare(strict_types = 1);

namespace Tests\Innmind\IP;

use Innmind\IP\{
    IPv6,
    IP
};
use PHPUnit\Framework\TestCase;

class IPv6Test extends TestCase
{
    /**
     * @dataProvider addresses
     */
    public function testInterface($address)
    {
        $this->assertInstanceOf(IP::class, new IPv6($address));
        $this->assertSame($address, (new IPv6($address))->toString());
    }

    public function testEquals()
    {
        $this->assertTrue((new IPv6('::1'))->equals(new IPv6('::1')));
        $this->assertFalse((new IPv6('::1'))->equals(new IPv6('::2')));
    }

    public function testLocalhost()
    {
        $ip = IPv6::localhost();

        $this->assertInstanceOf(IPv6::class, $ip);
        $this->assertTrue($ip->equals(new IPv6('::1')));
    }

    /**
     * @expectedException Innmind\IP\Exception\AddressNotMatchingIPv6Format
     */
    public function testThrowWhenInvalidFormat()
    {
        new IPv6('localhost');
    }

    /**
     * @expectedException Innmind\IP\Exception\AddressNotMatchingIPv6Format
     */
    public function testThrowWhenOutOfBound()
    {
        new IPv6('::z');
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
