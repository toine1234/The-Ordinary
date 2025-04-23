<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;

class Store{

    public static function getAllStore(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM ql_kho";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}