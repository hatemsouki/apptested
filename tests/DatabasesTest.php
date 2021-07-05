<?php 
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class DatabasesTest extends TestCase
{

    static private $mysqli = null;

    private $conn = null;


protected function setUp()
{
    if (!extension_loaded('mysqli')) {
        $this->markTestSkipped(
          'The MySQLi extension is not available.'
        );
    }
    parent::setUp();
    $this->assertTrue(TRUE);
}

public function testConnection()
{
    
    $this->conn = new mysqli("localhost","root","","testing");
    if(mysqli_connect_error()) {
        $this->assertTrue(FALSE);
    }else{
        $this->assertTrue(TRUE);
    }
}

   
}