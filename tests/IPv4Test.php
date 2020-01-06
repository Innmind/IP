<?php
declare(strict_types = 1);

namespace Tests\Innmind\IP;

use Innmind\IP\{
    IPv4,
    IP
};
use PHPUnit\Framework\TestCase;

class IPv4Test extends TestCase
{
    /**
     * @dataProvider addresses
     */
    public function testInterface($address)
    {
        $this->assertInstanceOf(IP::class, new IPv4($address));
        $this->assertSame($address, (new IPv4($address))->toString());
    }

    public function testEquals()
    {
        $this->assertTrue((new IPv4('127.0.0.1'))->equals(new IPv4('127.0.0.1')));
        $this->assertFalse((new IPv4('127.0.0.1'))->equals(new IPv4('127.0.0.2')));
    }

    public function testLocalhost()
    {
        $ip = IPv4::localhost();

        $this->assertInstanceOf(IPv4::class, $ip);
        $this->assertTrue($ip->equals(new IPv4('127.0.0.1')));
    }

    /**
     * @expectedException Innmind\IP\Exception\AddressNotMatchingIPv4Format
     */
    public function testThrowWhenInvalidFormat()
    {
        new IPv4('localhost');
    }

    /**
     * @expectedException Innmind\IP\Exception\AddressNotMatchingIPv4Format
     */
    public function testThrowWhenOutOfBound()
    {
        new IPv4('256.0.0.1');
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
