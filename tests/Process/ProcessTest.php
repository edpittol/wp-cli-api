<?php
namespace WP_CLI\Api\Test\Composer;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;
use WP_CLI\Api\Test\Dummy\Logger\Logger;
use Psr\Log\LoggerInterface;

class ProcessTest extends TestCase
{

    public function testGetWpCliBin()
    {
        $process = new Process('cli', 'version');
        $this->assertRegExp('/\/wp$/', $process->getWpCliBin());
    }

    public function testRun()
    {
        $process = new Process('cli', 'version');
        $process->run();
    }

    public function testRunThrowsProcessFailedException()
    {
        $this->expectException(ProcessFailedException::class);
        $process = new Process('foo', 'baz');
        $process->run();
    }

    public function testBuilder()
    {
        $process = new Process('cli', 'version');
        $this->assertInstanceOf(ProcessBuilder::class, $process->getBuilder());
    }

    public function testLogger()
    {
        $process = new Process('cli', 'version');
        $logger = new Logger();
        
        $process->setLogger($logger);
        $this->assertInstanceOf(LoggerInterface::class, $process->getLogger());
        
        $process->run();
        $this->assertRegExp('/^\[info\]/', $logger->getOutput()[0]);
    }

    public function testLoggerError()
    {
        $this->expectException(ProcessFailedException::class);
        $process = new Process('non-existent', 'command');
        $logger = new Logger();
        
        $process->setLogger($logger);
        
        $process->run();
        $this->assertRegExp('/^\[error\]/', $logger->getOutput()[0]);
    }
}
