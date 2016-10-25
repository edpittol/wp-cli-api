<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\ConfigCommand;


class CheckUpdateCommandTest extends TestCase
{
    public function getWpConfigFile()
    {
        return __DIR__ . '/../../wp/wp-config.php';
    }

    public function setUp()
    {
        // remove wp-config.php
        unlink($this->getWpConfigFile());
    }
    
    public function tearDownAfterClass()
    {
        // create the default wp-config.php
        $command = new ConfigCommand();
        $command->run();
    }
    
    public function testConfig()
    {
        $coreCommand = new ConfigCommand();
        $coreCommand->run();
    }
    
    public function testConfigExtraPhp()
    {
        $extraPhp = 'define( \'WPTEST\', \'test\' );';
        
        $coreCommand = new ConfigCommand(array('--extra-php'), $extraPhp);
        $coreCommand->run();
        
        $wpConfig = file_get_contents($this->getWpConfigFile());
        
        $this->assertContains($extraPhp, $wpConfig);
    }
}
