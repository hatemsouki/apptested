<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
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

        $this->conn = new mysqli("localhost", "root", "", "testing");
        if (mysqli_connect_error()) {
            return $this->assertTrue(FALSE);
        } else {
            return  $this->assertTrue(TRUE);
        }
    }

    public function testAddCustomer()
    {

        $Customers = new Customers();
        $data = ['name' => 'name ' . rand(0, 3), 'email' => 'email' . rand(0, 3) . '@gmail.com', 'username' => 'user' . rand(0, 3), 'password' => rand(0, 8)];
        $sql = $Customers->insertData($data);
        if (mysqli_connect_error() || $sql == false) {
            return   $this->assertTrue(FALSE);
        } else {
            return  $this->assertTrue(TRUE);
        }
    }

    public function testUpdateCustomer()
    {

        $Customers = new Customers();
        $data = ['name' => 'name' . rand(4, 7), 'email' => 'email' . rand(4, 7) . '@gmail.com', 'username' => 'user' . rand(4, 7),'id' => 1];
        $sql = $Customers->updateRecord($data);
        if (mysqli_connect_error() || $sql == false) {
            return $this->assertTrue(FALSE);
        } else {
            return $this->assertTrue(TRUE);
        }
    }

    public function testDeleteCustomer()
    {

        $Customers = new Customers();
        $id = 1;
        $sql = $Customers->deleteRecord($id);
        if (mysqli_connect_error() || $sql == false) {
            return  $this->assertTrue(FALSE);
        } else {
            return $this->assertTrue(TRUE);
        }
    }
}
