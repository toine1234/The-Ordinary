<?php
namespace App\Models;
use App\Models\Database;

class Revenue{
    public static function Revenue(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT 
                    DATE_FORMAT(o.Ngay_Dat, '%Y-%m') AS month,
                    SUM(oi.price_each * oi.so_luong) AS revenue,
                    SUM((oi.price_each - s.Gia_Nhap) * oi.so_luong) AS profit
                    
                    FROM don_hang o
                    JOIN chi_tiet_don_hang oi ON o.ID_Don_Hang = oi.ID_Don_Hang
                    JOIN san_pham p ON oi.ID_San_Pham = p.ID_San_Pham
                    JOIN ql_kho s ON s.ID_San_Pham = oi.ID_San_Pham
                    GROUP BY month
                    ORDER BY month ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function Bestsellers(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT p.Ten_SP, SUM(oi.so_luong) as sold
            FROM chi_tiet_don_hang oi
            JOIN san_pham p ON oi.ID_San_Pham = p.ID_San_Pham
            GROUP BY oi.ID_San_Pham
            ORDER BY sold DESC
            LIMIT 5";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function TotalQuantity(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT SUM(p.so_luong) as total_quantity
                FROM chi_tiet_don_hang p";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function LeastProduct(){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT p.Ten_SP, COALESCE(SUM(oi.so_luong), 0) as sold
            FROM san_pham p
            LEFT JOIN chi_tiet_don_hang oi ON p.ID_San_Pham = oi.ID_San_Pham
            GROUP BY p.ID_San_Pham
            ORDER BY sold ASC
            LIMIT 5";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}