<?php
namespace App\Models;
require_once __DIR__ . "/../Models/Database.php";
use App\Models\Database;

class Account
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

    public static function findByID($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = 'SELECT * FROM tai_khoan WHERE ID_Khach_Hang = :id';
        $stmt = $db->prepare($query);
        $stmt->execute([':id'=> $id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAllAccount(){
        $database = new Database();
        $db = $database->getConnection();
        $query = 'SELECT * FROM tai_khoan';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SearchAccount($keyword) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM tai_khoan WHERE ID_Khach_Hang LIKE ?";
        $stmt = $db->prepare($query);
        $stmt->execute(['%' . $keyword . '%']);
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


    public static function createAccount($id, $email, $password,$token,$tokenExpireAt)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "INSERT INTO tai_khoan (ID_Khach_Hang,Password,Email,Roles,Ngay_Tao,token,token_expire_at) VALUES (:id, :password, :email, :roles, NOW(),:token,:expireToken)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':password' => $password,
            ':email' => $email,
            ':roles' => 'customer',
            ':token'=> $token,
            ':expireToken'=> $tokenExpireAt
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function createUser($id, $email, $fullname, $phone)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "INSERT INTO khach_hang (ID_Khach_Hang,Email,HoTen,SDT) VALUES (:id, :email, :fullname, :phone)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':email' => $email,
            ':fullname' => $fullname,
            ':phone' => $phone,
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function changePassword($id, $newPassword, $email){
        $database = new Database();
        $db = $database->getConnection();
        $query = 
        'UPDATE tai_khoan
        SET Password = :newPassword
        WHERE ID_Khach_Hang = :id OR Email = :email';
        $stmt = $db->prepare($query);
        $stmt->execute([ 
            ':id' => $id, 
            ':newPassword' => $newPassword,
            ':email' => $email
        ]);

    }

    public static function checkToken($email,$token){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM tai_khoan 
        WHERE Email = ? AND token = ? AND is_verified = 0";
        $stmt = $db->prepare($query);
        $stmt->execute(params: [$email,$token]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function updateToken($email, $token, $expire){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE tai_khoan SET token = ?, token_expire_at = ?, is_verified = 0 WHERE Email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute(params: [$token,$expire,$email]);
        
    }

    public static function updateVerifedAccount($email){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE tai_khoan SET is_verified = 1, token = NULL, token_expire_at = NULL WHERE Email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute(params: [$email]);
    }

    public static function updateSatusAccount($id, $status){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE tai_khoan SET trang_thai = ? WHERE ID_Khach_Hang = ?";
        $stmt = $db->prepare($query);
        $stmt->execute(params: [$status,$id]);
    }
}