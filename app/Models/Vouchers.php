<?php
namespace App\Models;
use App\Models\Database;

class Vouchers{
    public static function get($code){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT endow FROM voucher WHERE code = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$code]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}