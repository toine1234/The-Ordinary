<?php
namespace App\Models;
require_once __DIR__ .'/../Models/Database.php';
use App\Models\Database;

class Account{

    public static function getAccountById($id) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE ID_Khach_Hang = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}
?>