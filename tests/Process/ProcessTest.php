<?php
namespace WP_CLI\Api\Composer\Test;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;

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

    public function testGetBuilder()
    {
        $process = new Process('cli', 'version');
        $this->assertInstanceOf(ProcessBuilder::class, $process->getBuilder());
    }

    public function testRunThrowsProcessFailedException()
    {
        $this->expectException(ProcessFailedException::class);
        $process = new Process('foo', 'baz');
        $process->run();
    }
}
