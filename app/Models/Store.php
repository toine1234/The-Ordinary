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

    public static function updateQuantity($id, $qty){

        if ($qty < 0){
            header('Location: '. $_SERVER['HTTP_REFERER']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Insufficient stock !'
                ];
            exit;
        }

        $database = new Database();
        $db = $database->getConnection();
        $query = 
        "UPDATE ql_kho 
        SET SL = :qty 
        WHERE  ID_San_Pham = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(
            [
                ':qty' => $qty,
                ':id' => $id
            ]
        );
    }

    public static function getQuantityById($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT SL FROM ql_kho WHERE ID_San_Pham = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}