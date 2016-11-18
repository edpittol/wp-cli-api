<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\CreateCommand;
use WP_CLI\Api\Command\Db\DropCommand;
use Symfony\Component\Process\Exception\ProcessFailedException;
use WP_CLI\Api\Command\Core\InstallCommand;

class CreateCommandTest extends TestCase
{

    public function testCreate()
    {
        $dbCommand = new DropCommand();
        $return = $dbCommand->run();
        
        $dbCommand = new CreateCommand();
        $return = $dbCommand->run();
        $this->assertNull($return);
        
        $coreCommand = new InstallCommand();
        $coreCommand->run();
    }
    
    public function testCreateIfAlreadyExists()
    {
        $this->expectException(ProcessFailedException::class);
        
        $dbCommand = new CreateCommand();
        $dbCommand->run();
    }
}
