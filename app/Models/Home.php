<?php
namespace App\Models;
require_once __DIR__ . "/../Models/Database.php";
use App\Models\Database;

class Home{
    public static function getDataHome(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM home";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function update($data){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE home SET slider = ?, banner = ?, heading = ?, caption = ? WHERE id = 1";
        $stmt = $db->prepare($query);
        $stmt->execute([$data['slider'],$data['banner'],$data['heading'],$data['caption']]);
    }
}