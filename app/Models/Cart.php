<?php
namespace App\Models;
require_once __DIR__ . "/../Models/Database.php";
use App\Models\Database;

class Cart
{

    public static function get_cart($user_id)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT 
                    san_pham.ID_San_Pham,
                    san_pham.Ten_SP,
                    san_pham.Gia,
                    san_pham.Hinh_Anh,
                    gio_hang.ID_Gio_Hang,
                    gio_hang.SL
                FROM 
                    gio_hang
                JOIN 
                    san_pham ON gio_hang.ID_San_Pham = san_pham.ID_San_Pham
                WHERE 
                    gio_hang.ID_Khach_Hang = :user_id";
        $stmt = $db->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function CreateCart($user_id, $productId, $quantity)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM gio_hang WHERE ID_Khach_Hang = :user_id AND ID_San_Pham = :productId";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":user_id"=> $user_id,
            ":productId"=> $productId,
        ]);
        $item = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($item) {
            // Nếu đã có thì cập nhật số lượng
            $newQuantity = $item['SL'] + $quantity;
            $update = "UPDATE gio_hang SET SL = :quantity WHERE ID_Khach_Hang = :user_id AND ID_San_Pham = :productId";
            $stmt = $db->prepare($update);
            $stmt->execute([
                ":quantity"=> $newQuantity,
                "user_id"=> $user_id,
                ":productId"=> $productId,
            ]);
        } else {
            // Nếu chưa có thì thêm mới
            $insert = "INSERT INTO gio_hang (ID_Khach_Hang, ID_San_Pham, SL) VALUES (:user_id, :productId, :quantity)";
            $stmt = $db->prepare($insert);
            $stmt->execute([
                ":user_id"=> $user_id,
                ":productId"=> $productId,
                ":quantity"=> $quantity,
            ]);
        }
    }

    public static function delete($cartId)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "DELETE FROM gio_hang WHERE ID_Gio_Hang = :cartId";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":cartId"=> $cartId
        ]);
    }

    public static function update($cartId,$quantity){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE gio_hang SET SL = ? WHERE ID_Gio_Hang = ? ";
        $stmt = $db->prepare($query);
        $stmt->execute([
            $quantity,
            $cartId
        ]);
    }

    public static function deleteByIdProduct($idProduct){
        $database = new Database();
        $db = $database->getConnection();
        $query = "DELETE FROM gio_hang WHERE ID_San_Pham = :id_product";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":id_product"=> $idProduct
        ]);
    }
}
?>