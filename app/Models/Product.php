<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\Store;


class Product {
    public static function getAllProducts() {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAllProductLimit($page) {
        $limit = 12;
        $offset = ($page -1) * $limit;
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT COUNT(*) AS total FROM san_pham";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        unset($stmt);

        $total_page = ceil($total[0]["total"] / $limit);
        $query = "SELECT * FROM san_pham LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return [
            "total_page"=> $total_page,
            "result"=> $result,
        ];
    }

    public static function getProductsById($id) {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM san_pham WHERE ID_San_Pham = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([":id"=>trim($id)]);
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

        $imageUrls = [];

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === 0) {
                $result = (new UploadApi())->upload($tmp_name, [
                    'folder' => 'product_gallery'
                ]);

                $imageUrls[] = $result['secure_url'];
            }
        }

        $imageUrlsStr = implode(';', $imageUrls);



        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO ql_kho (Gia_Nhap, SL, Don_Vi_Cung_Cap, NSX, HSD, Ngay_Tao) VALUES (:price, :quantity, :producer, :exp, :mfg, NOW())";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'price' => $data['price_store'],
            ':quantity' => $data['quantity_store'],
            ':producer' => $data['producer_store'],
            ':exp' => $data['exp'],
            'mfg' => $data['mfg']
        ]);
        $product_id = $db->lastInsertId();
        unset($stmt);

        $query = 'INSERT INTO san_pham (ID_San_Pham, ID_Danh_Muc, Hinh_Anh ,Ten_SP, Mo_Ta, Gia, SL, Dung_Tich, Targets, Format, Suited_to, Key_ingredients) VALUES (:id, :cate,:img, :name, :description,:price,:quantity,:size,:targets,:format,:suited,:key_ingredients)';
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":id" => $product_id,
            ":cate" => '1',
            ":img" => $imageUrlsStr,
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

        Store::updateQuantity($product_id,$data['quantity_store'] - $data['quantity']);
        
    }

    public static function delete($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "DELETE FROM san_pham WHERE ID_San_Pham= :id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ":id"=> $id
        ]);
    }

    public static function getQuantityById($id){
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT SL FROM san_pham WHERE ID_San_Pham = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':id'=>$id
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function UpdateQuantityById($id, $qty){
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE san_pham 
        SET SL = :qty
        WHERE ID_San_Pham = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':id'=>$id, 
            ':qty'=>$qty
        ]);
    }
}