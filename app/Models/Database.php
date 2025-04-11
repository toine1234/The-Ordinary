<?php
namespace App\Models;
use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $dbName = 'theordinarysql2';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() 
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
