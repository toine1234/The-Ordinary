<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;
use Cloudinary\Api\Upload\UploadApi;


class Product {
    public static function getAllProducts() {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getProductsById($id) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham WHERE ID_San_Pham = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public static function getFilteredProducts($types = []) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham";
        if (!empty($types)) {
            $placeholders = implode(',', array_fill(0, count($types), '?'));
            $query .= " WHERE Format IN ($placeholders) ";
        }
        
        $stmt = $db->prepare($query);
        $stmt->execute($types);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getSortedProducts($sortBy = null) {
        $database = new Database();
        $db = $database->getConnection();
        $sql = "SELECT * FROM san_pham";
        $query = "";

        switch ($sortBy) {
            case 'Rank by lowest price':
                $query = " ORDER BY Gia ASC";
                break;
            case 'Rank by highest price':
                $query = " ORDER BY Gia DESC";
                break;
            case 'name_asc':
                $query = " ORDER BY name ASC";
                break;
            case 'name_desc':
                $query = " ORDER BY name DESC";
                break;
            default:
                break;
        }

        $stmt = $db->prepare($sql . $query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function SearchProduct($keyword) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham WHERE Ten_SP LIKE ?";
        $stmt = $db->prepare($query);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function Update($data) {
        $database = new Database();
        $db = $database->getConnection();
        $query = 
        'UPDATE san_pham 
        SET Ten_SP = :name, Mo_Ta = :description, Gia = :price, SL = :quantity, Dung_Tich = :size, Targets = :targets, Format = :format, Suited_to = :suited, Key_ingredients = :key_ingredients
        WHERE ID_San_Pham = :id';
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":id"=>$data['id'],
            ":name"=>$data['name'],
            ":description"=>$data['description'],
            ":price"=>$data['price'],
            ":quantity" => $data['quantity'],
            ":size" => $data['size'],
            ":targets" => $data['targets'],
            ":format" => $data['format'],
            ":suited"=> $data['suited'],
            ":key_ingredients"=> $data['key_ingredients']

        ]);
    }

    public static function Create($data){
        $database = new Database();
        $db = $database->getConnection();
        $query = 'INSERT INTO san_pham (ID_San_Pham, ID_Danh_Muc, Ten_SP, Mo_Ta, Gia, SL, Dung_Tich, Targets, Format, Suited_to, Key_ingredients) VALUES (:id, :cate, :name, :description,:price,:quantity,:size,:targets,:format,:suited,:key_ingredients)';
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":id" => 'SP001',
            ":cate" => '1',
            ":name"=>$data['name'],
            ":description"=>$data['description'],
            ":price"=>$data['price'],
            ":quantity" => $data['quantity'],
            ":size" => $data['size'],
            ":targets" => $data['targets'],
            ":format" => $data['format'],
            ":suited"=> $data['suited'],
            ":key_ingredients"=> $data['key_ingredients']

        ]);
        // $product_id = $db->lastInsertId();
        unset($stmt);

        // $query = "INSERT INTO ql_kho (ID_San_Pham) VALUES (:id)";
        // $stmt = $db->prepare($query);
        // $stmt->execute([':id' => 'SP001']);
        // unset($stmt);

        
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $result = (new UploadApi())->upload($tmp_name, [
                'folder' => 'product_images'
            ]);

            $publicUrl = $result['secure_url']; // ảnh URL từ Cloudinary

            // Lưu vào DB:
            $query = "INSERT INTO thu_vien_anh (ID_San_Pham, img_name) VALUES (:id, :name)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                ":id" => 'SP001',
                ":name" => $publicUrl
            ]);
        
    }
        
    }
}