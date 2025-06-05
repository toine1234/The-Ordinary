<?php
namespace App\Models;
require_once __DIR__ . '/../Models/Database.php';
use App\Models\Database;

class Users
{

    public static function getUserById($id)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT * FROM khach_hang WHERE ID_Khach_Hang = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function getAllUsers($page)
    {
        $limit = 6;
        $offset = ($page -1) * $limit;
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT COUNT(*) AS total FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        unset($stmt);

        $total_page = ceil($total[0]["total"]/$limit);

        $query = "SELECT 
                u.*,
                t.trang_thai,
                COUNT(o.ID_Don_Hang) AS total_orders,
                COALESCE(SUM(o.tong_tien), 0) AS total_spent
            FROM khach_hang u
            LEFT JOIN don_hang o ON u.ID_Khach_Hang = o.ID_Khach_Hang
            LEFT JOIN tai_khoan t ON u.ID_Khach_Hang = t.ID_Khach_Hang
            GROUP BY u.ID_Khach_Hang;
            LIMIT $offset,$limit";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return [
            "total_page" => $total_page,
            "result" => $result
        ];
    }

    public static function updateUser($id, $fullname, $phone, $email)
    {
        $database = new Database();
        $db = $database->getConnection();
        $query =
            'UPDATE khach_hang 
        SET HoTen = :fullname, SDT = :phone, Email = :email 
        WHERE ID_Khach_Hang = :id';
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':fullname' => $fullname,
            ':phone' => $phone,
            'email' => $email,
            ':id' => $id
        ]);

    }

    public static function SearchUser($keyword,$page)
    {
        $limit = 6;
        $offset = ($page -1) * $limit;
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT COUNT(*) AS total FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        unset($stmt);

        $total_page = ceil($total[0]["total"]/$limit);

        $query = "SELECT 
                u.*,
                t.trang_thai,
                COUNT(o.ID_Don_Hang) AS total_orders,
                COALESCE(SUM(o.tong_tien), 0) AS total_spent
            FROM khach_hang u
            LEFT JOIN don_hang o ON u.ID_Khach_Hang = o.ID_Khach_Hang
            LEFT JOIN tai_khoan t ON u.ID_Khach_Hang = t.ID_Khach_Hang
            WHERE u.ID_Khach_Hang LIKE ? OR u.HoTen LIKE ?
            GROUP BY u.ID_Khach_Hang;
            LIMIT $offset,$limit";

        $stmt = $db->prepare($query);
        $stmt->execute(['%'.$keyword.'%','%'.$keyword.'%']);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return [
            "total_page" => $total_page,
            "result" => $result
        ];

    }

    public static function sortUser($sortBy = null, $page){
        
        $limit = 6;
        $offset = ($page -1) * $limit;
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT COUNT(*) AS total FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        unset($stmt);

        $total_page = ceil($total[0]["total"]/$limit);

        $sql = "SELECT 
                u.*,
                t.trang_thai,
                COUNT(o.ID_Don_Hang) AS total_orders,
                COALESCE(SUM(o.tong_tien), 0) AS total_spent
            FROM khach_hang u
            LEFT JOIN don_hang o ON u.ID_Khach_Hang = o.ID_Khach_Hang
            LEFT JOIN tai_khoan t ON u.ID_Khach_Hang = t.ID_Khach_Hang
            GROUP BY u.ID_Khach_Hang";

        $query ="";

        switch ($sortBy) {
            case 'Sort by a-z name':
                $query = " ORDER BY u.HoTen ASC LIMIT $offset,$limit ";
                break;
            case 'Sort by z-a name':
                $query = " ORDER BY u.HoTen DESC LIMIT $offset,$limit ";
                break;
            case 'Sort by lowest orders':
                $query = " ORDER BY total_orders ASC LIMIT $offset,$limit ";
                break;
            case 'Sort by highest orders':
                $query = " ORDER BY total_orders DESC LIMIT $offset,$limit ";
                break;
            case 'Sort by lowest spent':
                $query = " ORDER BY total_spent ASC LIMIT $offset,$limit ";
                break;
            case 'Sort by highest spent':
                $query = " ORDER BY total_spent DESC LIMIT $offset,$limit ";
                break;
            default:
                break;
        }

        $stmt = $db->prepare($sql.$query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return [
            "total_page" => $total_page,
            "result" => $result
        ];
    }

    public static function filterUser($gender,$status,$page){
        
        $limit = 6;
        $offset = ($page -1) * $limit;
        $database = new Database();
        $db = $database->getConnection();
        $query = "SELECT COUNT(*) AS total FROM khach_hang";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        unset($stmt);

        $total_page = ceil($total[0]["total"]/$limit);

        $query = "SELECT 
                u.*,
                t.trang_thai,
                COUNT(o.ID_Don_Hang) AS total_orders,
                COALESCE(SUM(o.tong_tien), 0) AS total_spent
            FROM khach_hang u
            LEFT JOIN don_hang o ON u.ID_Khach_Hang = o.ID_Khach_Hang
            LEFT JOIN tai_khoan t ON u.ID_Khach_Hang = t.ID_Khach_Hang
            WHERE u.gioi_tinh LIKE ? AND t.trang_thai LIKE ?
            GROUP BY u.ID_Khach_Hang
            LIMIT $offset,$limit;";

        


        $stmt = $db->prepare($query);
        $stmt->execute(['%'.$gender.'%','%'.$status.'%']);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return [
            "total_page" => $total_page,
            "result" => $result
        ];
    }

}
?>