<?php
namespace App\Controllers;
use App\Models\Users;
use App\Models\Account;
use App\Models\Product;
use App\Core\JWT;

class AdminController
{
    public function index()
    {
        if (!isset($_COOKIE["accessToken"])) {
            header('Location: /The-Ordinary/login');
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login'
            ];
            exit;
        }

        require_once __DIR__ . '/../Views/admin.php';
        
    }
}