<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;
use App\Models\Cart;

class Order{
    public static function create($userId, $shippingAddress, $paymentMethod, $items, $cost_ship, $total){
        $database = new Database();
        $db = $database->getConnection();
        $db->beginTransaction();
        $query = "INSERT INTO don_hang (ID_Khach_Hang, dia_chi_giao, payment_method, payment_status, tong_tien, phi_ship)
                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$userId,$shippingAddress,$paymentMethod,'paid',$total,$cost_ship]);
        $orderId = $db->lastInsertId();
        
        foreach ($items as $item ){
            
            $productId = $item['ID_San_Pham'];
            $qty = $item['SL'];
            $price = $item['Gia'];

            $query = "INSERT INTO chi_tiet_don_hang (ID_Don_Hang, ID_San_Pham, so_luong, price_each)
                        VALUES (?, ?, ? ,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$orderId, $productId, $qty, $price]);
            Cart::deleteByIdProduct($productId);
        }

        
        $db->commit();

        return $orderId;
    }

    public static function getOrderById($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM don_hang WHERE ID_Don_Hang = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}