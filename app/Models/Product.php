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

    public static function getProductsById($id) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham WHERE IP_San_Pham = $id";
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

    public static function getSortedProducts($sortBy = null) {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "SELECT * FROM san_pham";
        $query = "";

        switch ($sortBy) {
            case 'Rank by lowest price':
                $query = " ORDER BY Gia ASC";
                break;
            case 'Rank by highest price':
                $query = " ORDER BY Gia DESC";
                break;
            case 'name_asc':
                $query = " ORDER BY name ASC";
                break;
            case 'name_desc':
                $query = " ORDER BY name DESC";
                break;
            default:
                break;
        }

        $stmt = $db->prepare($sql . $query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}