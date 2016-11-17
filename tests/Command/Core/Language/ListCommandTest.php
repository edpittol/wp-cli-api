<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

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
        $this->assertEquals('en_US', $data[0]->getLanguage());
        $this->assertEquals('English (United States)', $data[0]->getEnglishName());
        $this->assertEquals('English (United States)', $data[0]->getNativeName());
        $this->assertEquals('active', $data[0]->getStatus());
        $this->assertEquals('none', $data[0]->getUpdate());
        $this->assertNull($data[0]->getUpdated());
    }
}
