<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Entity\Language;
use WP_CLI\Api\Command\Core\Language\ListCommand;

class ListCommandTest extends TestCase
{

    public function testList()
    {
        $coreCommand = new ListCommand();
        $data = $coreCommand->run();
        $this->assertInstanceOf(Language::class, $data[0]);
    }

    public function testListFilter()
    {
        $coreCommand = new ListCommand(array('--status=active'));
        $data = $coreCommand->run();
        $this->assertInstanceOf(Language::class, $data[0]);
    }
}
