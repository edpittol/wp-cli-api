<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Test\Dummy\Command\Command;
use WP_CLI\Api\Test\Dummy\Command\CommandWithData;
use WP_CLI\Api\Test\Dummy\Command\CommandFlagArg;
use WP_CLI\Api\Test\Dummy\Command\CommandAssociativeReturn;
use WP_CLI\Api\Test\Dummy\Command\CommandEmptyArrayReturn;

class CommandTest extends TestCase
{

    public function testRun()
    {
        $command = new Command();
        $this->assertNull($command->run());
    }

    public function testRunWithReturn()
    {
        $command = new CommandWithData(array(
            '--search=siteurl'
        ));
        $returnData = $command->run();
        $option = $returnData[0];
        $this->assertInstanceOf(\stdClass::class, $option);
        $this->assertObjectHasAttribute('option_name', $option);
    }
    
    public function testRunWithAssociativeReturn()
    {
        $command = new CommandAssociativeReturn();
        $returnData = $command->run();
        $this->assertInstanceOf(\stdClass::class, $returnData[0]);
    }
    
    public function testRunWithEmptyArrayReturn()
    {
        $command = new CommandEmptyArrayReturn();
        $returnData = $command->run();
        $this->assertEmpty($returnData);
    }
    
    public function testInvalidArgument()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Command(array('--foo'));
    }

    public function testDefaultArgumentsNoOverride()
    {
        $command = new CommandWithData(array(
            '--format=table'
        ));
        $this->assertEquals('table', $command->getArgument('format'));
    }

    public function testGetArguments()
    {
        $args = array(
            '--extra'
        );
        $command = new CommandFlagArg($args);
        $command->run();
        $this->assertEquals($args, $command->getArguments());
    }

    public function testGetArgument()
    {
        $command = new CommandFlagArg(array('--extra'));
        $command->run();
        $this->assertTrue($command->getArgument('extra'));
        $this->assertFalse($command->getArgument('foo'));

        $command = new Command();
        $this->assertEquals('json', $command->getArgument('format'));
    }
    
    public function testInput()
    {
        $command = new Command(array(), 'test');
        $this->assertEquals('test', $command->getInput());
        
        $command->setInput('newvalue');
        $this->assertEquals('newvalue', $command->getInput());
    }
}
