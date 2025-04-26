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
            $qtynew = Product::getQuantityById($productId)['SL'] - $qty;
            Product::UpdateQuantityById($productId, $qtynew );

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

    public static function getAllOrder(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM don_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getDetailOrderById($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT 
                o.ID_Don_Hang AS ID_Don_Hang,
                o.tong_tien,
                o.Ngay_Dat,
                p.Ten_SP AS Ten_SP,
                p.Hinh_Anh AS Hinh_Anh,
                oi.so_luong,
                oi.price_each
            FROM don_hang o
            JOIN chi_tiet_don_hang oi ON o.ID_Don_Hang = oi.ID_Don_Hang
            JOIN san_pham p ON oi.ID_San_Pham = p.ID_San_Pham
            WHERE o.ID_Don_Hang = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function UpdateStatus($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = 
        'UPDATE don_hang 
        SET Trang_Thai = :status
        WHERE ID_Don_Hang = :id';
        $stmt = $db->prepare($query);
        $stmt->execute([':id'=>$id, ':status' => 'shipped']);
    }

    public  static function SearchOrder($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = 
        'SELECT *
        FROM don_hang
        WHERE ID_Khach_Hang LIKE ?';
        $stmt = $db->prepare($query);
        $stmt->execute(['%'.$id.'%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function FilterStatus($filter = null) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM don_hang WHERE Trang_Thai = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$filter]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}