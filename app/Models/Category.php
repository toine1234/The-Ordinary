<?php
namespace App\Models;
require_once __DIR__ . "/../Models/Database.php";
use App\Models\Database;

class Category{
    public static function getCategory(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM danh_muc";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function create($id,$cate){
        $database =  new Database();
        $db = $database->getConnection();    
        $query = "INSERT INTO danh_muc (ID_Danh_Muc,Danh_Muc,Ngay_Tao) VALUES (?,?,NOW())";
        $stmt = $db->prepare($query);
        $stmt->execute([$id,$cate]);
    }

    public static function update($cate,$id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE danh_muc SET Danh_Muc = ? WHERE ID_Danh_Muc = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$cate,$id]);

    }

    public static function delete($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "DELETE danh_muc WHERE ID_Danh_Muc = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }
}

