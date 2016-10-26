<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\DownloadCommand;
use WP_CLI\Api\Command\Core\ConfigCommand;

class DownloadCommandTest extends TestCase
{
    public function testDowload()
    {
        $wpDir = __DIR__ . '/../../wp';
        shell_exec(sprintf('rm -rf %s', $wpDir));
        
        $coreCommand = new DownloadCommand();
        $coreCommand->run();
        
        // generate wp-config.php file
        $configCommand = new ConfigCommand();
        $configCommand->run();
    }
}
