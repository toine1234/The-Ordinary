<?php
namespace App\Models;

use App\Models\Database;

class Feedback
{
    public static function getFeedback($id)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * 
                FROM danh_gia d
                JOIN khach_hang k on d.ID_Khach_Hang = k.ID_Khach_Hang
                JOIN san_pham s on s.ID_San_Pham = d.ID_San_Pham
                WHERE d.ID_San_Pham = ?
                GROUP BY d.ID_Khach_Hang";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function add($data)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "INSERT INTO 
        danh_gia (ID_San_Pham, rating, hinh_anh, binh_luan, ID_Khach_Hang, loai_da, skin_tone, ngay_dang) 
        VALUES (?,?,?,?,?,?,?,NOW())";
        $stmt = $db->prepare($query);
        $stmt->execute([
            $data['id'], 
            $data['rating'],
            $data['images'],
            $data['comments'],
            $data['idUser'],
            $data['skintype'],
            $data['skintone'],
            
        ]);
    }
}