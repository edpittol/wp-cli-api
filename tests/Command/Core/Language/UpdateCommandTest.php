<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\UpdateCommand;

class LanguageUpdateCommandTest extends TestCase
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
