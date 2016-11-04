<?php
namespace WP_CLI\Api\Test\Command\Core;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\UpdateDbCommand;

class UpdateDbCommandTest extends TestCase
{
    public function testUpdate()
    {
        $coreCommand = new UpdateDbCommand();
        $coreCommand->run();
    }
}
