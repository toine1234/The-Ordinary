<?php
namespace App\Models;
use PDO;
use PDOException;


class Database
{
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $connection;
    private $config;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() 
    {
        try {
            $this->config = require __DIR__ .'/../../config/config.php';
            $this->host = $this->config['db']['host'];
            $this->dbName = $this->config['db']['dbname'];
            $this->username = $this->config['db']['user'];
            $this->password = $this->config['db']['pass'];
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
