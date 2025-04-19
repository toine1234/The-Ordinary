<?php
namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;

class UserController
{
    public function index(){
        
        if (isset($_COOKIE['accessToken'])) {
            session_start();
            $user = Users::getUserById($_SESSION['idUser']);
            $account = Account::findByID($_SESSION['idUser']);
            $_SESSION['username'] = $user['HoTen'];
        }

        else {
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
