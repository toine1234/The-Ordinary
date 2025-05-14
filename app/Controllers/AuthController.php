<?php
namespace App\Controllers;

use App\Models\Account;
use App\Core\JWT;
use App\Models\Cart;

class AuthController
{

    private $config;
    public function showLogin()
    {
        session_start();

        // create csrf_token
        if (empty($_SESSION['csrf_token'])){
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        if (isset($_COOKIE['accessToken'])) {
            header('Location: /The-Ordinary/account');
            exit;
        }

        require 'app/Views/layouts/header.php';
        require 'app/Views/login.php';
        require 'app/Views/layouts/footer.php';
    }


    public function login()
    {
        session_start();
        $this->config = require __DIR__ . '/../../config/config.php';
        JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
        $email = $_POST['email'] ?? '';
        $password = trim($_POST['password'] ?? '');
        $csrfToken = $_POST['csrf_token'] ??'';


        if (!hash_equals($_SESSION['csrf_token'], $csrfToken)) {
            
            
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'CSRF token validation failed!'
            ];
            header('Location: /The-Ordinary/login');
            die('CSRF token validation failed');
        }


        $userModel = new Account();
        $user = $userModel->findByEmail($email);


        if (!$user || !password_verify($password, $user[0]['Password'])) {
            http_response_code(401);
            echo json_encode(['message' => 'Invalid credentials']);
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Password or email is incorrect!'
            ];

            header('Location: /The-Ordinary/login');
            return;
        }

        if ($user[0]['is_verified'] == 0){
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Unverified email!'
            ];

            header('Location: /The-Ordinary/login');
            return;
        }


        $token = JWT::create(['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']], 60);
        echo json_encode([
            'token' => $token,
            'user' => ['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']],
            'message' => 'Login successful'
        ]);

        setcookie(
            'accessToken',
            $token,
            [
            'expires' => time() + 3600, 
            'path' => '/The-Ordinary',              
            'domain' => '',             
            'secure' => true,           
            'httponly' => true,
            'samesite' => 'Strict' 
            ]

        );

        session_start();
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Login in is success!'
        ];
        $_SESSION['idUser'] = $user[0]['ID_Khach_Hang'];
        $cartItems=Cart::get_cart($user[0]['ID_Khach_Hang']);
        $_SESSION['cart'] = $cartItems;

        

        header('Location: /The-Ordinary/account?page=account');
        exit;

    }

    public function logout()
    {
        session_start();
        unset($_SESSION['idUser']);
        unset($_SESSION['cart']);
        unset($_SESSION['username']);
        setcookie('accessToken', '', time() - 3600, '/The-Ordinary');

        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Logout successful!'
        ];
        header('Location: /The-Ordinary/login');
        exit;
    }
}
