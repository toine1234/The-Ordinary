<?php
namespace App\Models;
require_once __DIR__ ."/../Models/Database.php";
use App\Models\Database;

class Users{
    public static function findByEmail($email){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM tai_khoan WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->execute([':email'=>$email]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}