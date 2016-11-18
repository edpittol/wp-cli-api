<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\ImportCommand;

class ImportCommandTest extends TestCase
{
    private $dummySqlFile = 'Dummy/Resources/sql/insert_option.sql';
    
    public function tearDown()
    {
        $dbCommand = new ImportCommand(array('-'), 'DELETE FROM wp_options WHERE option_name="option_test"');
        $dbCommand->run();
    }
    
    public function testImport()
    {
        $dbCommand = new ImportCommand(array($this->dummySqlFile));
        $this->assertNull($dbCommand->run());
    }
    
    public function testImportStdin()
    {
        $query = file_get_contents($this->dummySqlFile);
        $dbCommand = new ImportCommand(array('-'), $query);
        $this->assertNull($dbCommand->run());
    }
}
