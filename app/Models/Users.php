<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;

class Users
{

    public static function getUserById($id)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE ID_Khach_Hang = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAllUsers(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function updateUser($id, $fullname,$phone,$email)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = 
        'UPDATE khach_hang 
        SET HoTen = :fullname, SDT = :phone, Email = :email 
        WHERE ID_Khach_Hang = :id';
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':fullname' => $fullname ,
            ':phone'=> $phone ,
            'email'=> $email,
            ':id' => $id
        ]);

    }

    public static function SearchUser($keyword) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE ID_Khach_Hang LIKE ?";
        $stmt = $db->prepare($query);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}
?>