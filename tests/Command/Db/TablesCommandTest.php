<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\TablesCommand;

class TablesCommandTest extends TestCase
{
    
    public function testTables()
    {
        $dbCommand = new TablesCommand();
        $this->assertNotEmpty($dbCommand->run());
    }
}
