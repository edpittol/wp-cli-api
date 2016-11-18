<?php
namespace WP_CLI\Api\Test\Command\Db;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Db\ExportCommand;

class ExportCommandTest extends TestCase
{
    public function tearDown()
    {
        // remove generated sql files
        $sqlFile = $this->getSqlFile();
        if ($sqlFile) {
            unlink($sqlFile);
        }
    }
    
    private function getSqlFile() {
        foreach (glob('*.sql') as $file) {
            return $file;
        }
        
        return false;
    }

    public function testExport()
    {
        $dbCommand = new ExportCommand();
        $this->assertNull($dbCommand->run());
        $this->assertNotEmpty($this->getSqlFile());
    }
    
    public function testExportOutput()
    {
        $dbCommand = new ExportCommand(array('-'));
        $this->assertNotEmpty($dbCommand->run());
    }
    
    public function testExportPorcelain()
    {
        $dbCommand = new ExportCommand(array('--porcelain'));
        $this->assertNotEmpty($dbCommand->run());
    }
    
    public function testExportAnotherFilename()
    {
        $file = 'another_mysql_file_name.sql';
        $dbCommand = new ExportCommand(array($file));
        $this->assertNull($dbCommand->run());
        $this->assertTrue(is_file($file));
    }
}
