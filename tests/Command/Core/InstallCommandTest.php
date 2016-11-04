<?php
namespace WP_CLI\Api\Test\Command\Core;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use WP_CLI\Api\Command\Core\InstallCommand;

class InstallCommandTest extends TestCase
{
    public function testInstall()
    {
        // Reset the database
        $process = new Process('db', 'reset', array(
            '--yes'
        ));
        $process->run();
        
        $coreCommand = new InstallCommand();
        $coreCommand->run();
    }
}
