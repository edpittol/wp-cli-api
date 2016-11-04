<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\UpdateCommand;

class UpdateCommandTest extends TestCase
{

    public function testUpdate()
    {        
        $coreCommand = new UpdateCommand();
        $coreCommand->run();
    }

    public function testUpdateWithDryRun()
    {        
        $coreCommand = new UpdateCommand(array('--dry-run'));
        $coreCommand->run();
    }
}
