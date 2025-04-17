<?php
namespace App\Controllers;

use App\Models\Users;
use App\Core\JWT;
use App\Models\Cart;

class AuthController
{

    private $config;
    public function showLogin()
    {
        session_start();

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

        $this->config = require __DIR__ . '/../../config/config.php';
        JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
        $email = $_POST['email'] ?? '';
        $password = trim($_POST['password'] ?? '');


        $userModel = new Users();
        $user = $userModel->findByEmail($email);

        // echo'<pre>';
        // print_r($user);
        // print_r('inputpassword:'.$password);
        // echo '</pre>';

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

        // if (!$user || $password !== $user[0]['Password']) { 
        //     http_response_code(401);
        //     echo json_encode(['message' => 'Invalid credentials']);
        //     return;
        // }


        $token = JWT::create(['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']], 60);
        echo json_encode([
            'token' => $token,
            'user' => ['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']],
            'message' => 'Login successful'
        ]);

        setcookie(
            'accessToken',
            $token,
            time() + (60 * 60),
            '/The-Ordinary',
        );

        session_start();
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Login in is success!'
        ];
        $_SESSION['idUser'] = $user[0]['ID_Khach_Hang'];
        $cartItems=Cart::get_cart($user[0]['ID_Khach_Hang']);
        $_SESSION['cart'] = $cartItems;

        header('Location: /The-Ordinary/account');
        exit;

    }

    public function logout()
    {
        session_start();
        unset($_SESSION['idUser']);
        unset($_SESSION['cart']);
        setcookie('accessToken', '', time() - 3600, '/The-Ordinary');
        session_destroy();
        header('Location: /The-Ordinary/login');
        exit;
    }
}
