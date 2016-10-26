<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use WP_CLI\Api\Command\Core\CheckUpdateCommand;

class CheckUpdateCommandTest extends TestCase
{

    public function testCheckUpdate()
    {
        $coreCommand = new CheckUpdateCommand();
        $data = $coreCommand->run();
        $this->assertNull($data);
    }

    public function testCheckUpdateMajorMinor()
    {
        // Do a major downgrade
        $process = new Process('core', 'update', array(
            '--version=3.7',
            '--force'
        ));
        $process->run();
        
        $coreCommand = new CheckUpdateCommand();
        $data = $coreCommand->run();
        $this->assertCount(2, $data);
        
        $this->assertEquals('minor', $data[0]->getUpdateType());
        $this->assertEquals('major', $data[1]->getUpdateType());
        
        $this->assertRegExp('/([0-9]+\.){1,2}[0-9]*/', $data[0]->getVersion());

        $version = str_replace('.', '\.', $data[0]->getVersion());
        $releaseRegex = sprintf('/^https\:\/\/downloads\.wordpress\.org\/release\/wordpress-%s.*\.zip$/', $version);
        $this->assertRegExp($releaseRegex, $data[0]->getPackageUrl());
        
        // back to the last version
        $process = new Process('core', 'update');
        $process->run();
    }
}
