<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\ResetCommand;
use WP_CLI\Api\Command\Core\InstallCommand;

class ResetCommandTest extends TestCase
{
    public function tearDown()
    {
        $coreCommand = new InstallCommand();
        $coreCommand->run();
    }
    
    public function testReset()
    {
        $dbCommand = new ResetCommand();
        $this->assertNull($dbCommand->run());
    }
}
