<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\OptimizeCommand;

class OptimizeCommandTest extends TestCase
{
    
    public function testOptimize()
    {
        $dbCommand = new OptimizeCommand();
        $this->assertNull($dbCommand->run());
    }
}
