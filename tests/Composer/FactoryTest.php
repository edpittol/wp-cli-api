<?php
namespace WP_CLI\Api\Test\Composer;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Composer\Factory;
use Composer\Composer;

class FactoryTest extends TestCase
{

    public function testCreateMinimal()
    {
        $factory = new Factory();
        $this->assertInstanceOf(Composer::class, $factory->createMinimal());
    }
}
