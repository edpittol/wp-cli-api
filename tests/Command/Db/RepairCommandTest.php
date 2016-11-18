<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\RepairCommand;

class RepairCommandTest extends TestCase
{
    
    public function testRepair()
    {
        $dbCommand = new RepairCommand();
        $this->assertNull($dbCommand->run());
    }
}
