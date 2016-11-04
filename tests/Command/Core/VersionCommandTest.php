<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\VersionCommand;

class VerifyChecksumsCommandTest extends TestCase
{    
    public function testVersion()
    {        
        $coreCommand = new VersionCommand();
        $version = $coreCommand->run();
        
        $this->assertRegExp('/[0-9]\.[0-9](\.[0-9])?/', $version);
    }
    
    public function testVersionExtra()
    {
        $coreCommand = new VersionCommand(array('--extra'));
        $version = $coreCommand->run();

        $this->assertRegExp('/WordPress version:.*\nDatabase revision:.*\nTinyMCE version:.*/', $version);        
    }
}
