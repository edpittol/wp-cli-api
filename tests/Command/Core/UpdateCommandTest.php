<?php
namespace WP_CLI\Api\Test\Command\Core;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use WP_CLI\Api\Command\Core\UpdateCommand;

class UpdateCommandTest extends TestCase
{
    public function testUpdate()
    {
        // Do a major downgrade
        $process = new Process('core', 'update', array(
            '--version=3.7',
            '--force'
        ));
        $process->run();

        $coreCommand = new UpdateCommand();
        $coreCommand->run();
    }

    public function testMinorUpdate()
    {
        // Do a major downgrade
        $process = new Process('core', 'update', array(
            '--version=3.7',
            '--force'
        ));
        $process->run();

        $coreCommand = new UpdateCommand(array('--minor'));
        $coreCommand->run();

        $process = new Process('core', 'version');
        $version = $process->run();
        $this->assertEquals('3.7.16', $version);

        // Do a major upgrade
        $process = new Process('core', 'update');
        $process->run();
    }
}
