<?php
namespace App\Controllers;

use App\Models\Account;

class AccountController
{
    public function index(){
        
        if (isset($_COOKIE['accessToken'])) {
            session_start();
            $account = Account::getAccountById($_SESSION['idUser']);
            $_SESSION['username'] = $account['HoTen'];
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
