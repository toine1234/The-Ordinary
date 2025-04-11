<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;

class Product {
    public static function getAllProducts() {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public static function getFilteredProducts($types = []) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham";
        if (!empty($types)) {
            $placeholders = implode(',', array_fill(0, count($types), '?'));
            $query .= " WHERE Format IN ($placeholders) ";
        }
        $stmt = $db->prepare($query);
        $stmt->execute($types);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}