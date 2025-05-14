<?php
namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;
use App\Core\JWT;
use App\Middlewares\AuthMiddleware;
use App\Models\Order;

class UserController
{
    public function index()
    {
        $jwt_decode = AuthMiddleware::AuthJWT();
        if (!$jwt_decode) {
            header('Location: /The-Ordinary/login');
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login'
            ];
            exit;
        } 

        if ($jwt_decode->Role === 'admin'){
            session_start();
            $user = Users::getUserById($jwt_decode->ID);
            header('Location: /The-Ordinary/admin?page=Products');
            exit;
        }
        session_start();
        $user = Users::getUserById($jwt_decode->ID);
        $account = Account::findByID($jwt_decode->ID);
        $orders = Order::getAllOrderByUser($user['ID_Khach_Hang']);
        $_SESSION['username'] = $user['HoTen'];
        

        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/account.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
