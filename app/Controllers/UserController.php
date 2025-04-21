<?php
namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;
use App\Core\JWT;

class UserController
{
    public function index()
    {
        if (isset($_COOKIE['accessToken'])) {
            JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
            $middleware = JWT::verify($_COOKIE['accessToken']);
            // echo "<pre>";
            // echo print_r($middleware);
            // echo "</pre>";
            if (!$middleware) {
                header('Location: /The-Ordinary/login');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Token is not match'
                ];
                exit;
            } else {

                if ($middleware->Role === 'admin'){
                    header('Location: /The-Ordinary/admin');
                    exit;
                }
                session_start();
                $user = Users::getUserById($middleware->ID);
                $account = Account::findByID($middleware->ID);
                $_SESSION['username'] = $user['HoTen'];
            }


        } else {
            header('Location: /The-Ordinary/login');
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login'
            ];
            exit;
        }

        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/account.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
