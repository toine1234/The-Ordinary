<?php
namespace App\Models;
require_once __DIR__ .'/../Models/Database.php';
use App\Models\Database;

class Account{
    public static function getAllAccounts() {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAccountById($id) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE ID_Khach_Hang = $id";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function searchAccount($keyword) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE Ten_KH LIKE ?";
        $stmt = $db->prepare($query);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAccountsByEmail($email) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE Email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
?>