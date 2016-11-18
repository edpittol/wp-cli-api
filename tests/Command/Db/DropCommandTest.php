<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\CreateCommand;
use WP_CLI\Api\Command\Db\DropCommand;
use WP_CLI\Api\Command\Core\InstallCommand;

class DropCommandTest extends TestCase
{
    public function tearDown()
    {
        $dbCommand = new CreateCommand();
        $dbCommand->run();
        
        $coreCommand = new InstallCommand();
        $coreCommand->run();
    }

    public function testDrop()
    {
        $dbCommand = new DropCommand();
        $this->assertNull($dbCommand->run());
    }
}
