<?php
namespace WP_CLI\Api\Test\Util;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Util\ArrayUtil;

class ArrayUtilTest extends TestCase
{

    public function testIsAssociative()
    {
        $util = new ArrayUtil();
        $this->assertFalse($util->isAssociative(array()));
        $this->assertFalse($util->isAssociative(array(
            'a',
            'b',
            'c'
        )));
        $this->assertFalse($util->isAssociative(array(
            '0' => 'a',
            '1' => 'b',
            '2' => 'c'
        )));
        $this->assertTrue($util->isAssociative(array(
            '0' => 'a',
            '01' => 'b',
            '2' => 'c'
        )));
        $this->assertTrue($util->isAssociative(array(
            'x' => 'a',
            'y' => 'b',
            'z' => 'c'
        )));
    }
}
