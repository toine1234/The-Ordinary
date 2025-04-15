<?php
namespace App\Models;
require_once __DIR__ . "/../Models/Database.php";
use App\Models\Database;

class Users
{
    public static function findByEmail($email)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM tai_khoan WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public static function generateUUID(): string
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff), // 32 bits
            mt_rand(0, 0xffff), // 16 bits
            mt_rand(0, 0x0fff) | 0x4000, // version 4
            mt_rand(0, 0x3fff) | 0x8000, // variant
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }


    public static function createUser($email, $password)
    {
        $id = self::generateUUID();
        $database = new Database();
        $db = $database->getConnection();
        $query = "INSERT INTO tai_khoan (ID_Khach_Hang,Password,Email,Roles,Ngay_Tao) VALUES (:id, :password, :email, :roles, NOW())";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':password' => $password,
            ':email' => $email,
            ':roles' => 'customer'
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }
}