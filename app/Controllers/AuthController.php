<?php
namespace App\Controllers;

use App\Models\Users;
use App\Core\JWT;

class AuthController {

    private $config;
    public function showLogin() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/login.php';
        require 'app/Views/layouts/footer.php';
    }

    
    public function login() {
        
        $this->config = require __DIR__ .'/../../config/config.php';
        JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
        // $data = json_decode(file_get_contents('php://input'), true);
        // echo'<pre>';
        // print_r($data);
        // echo '</pre>';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        $userModel = new Users();
        $user = $userModel->findByEmail($email);

        // echo'<pre>';
        // print_r($user);
        // echo '</pre>';

        // if (!$user || !password_verify($password, $user['password'])) {
        //     http_response_code(401);
        //     echo json_encode(['message' => 'Invalid credentials']);
        //     return;
        // }
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';

        if (!$user || $password !== $user[0]['Password']) { 
            http_response_code(401);
            echo json_encode(['message' => 'Invalid credentials']);
            return;
        }


        $token = JWT::create(['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']], 60);
        echo json_encode([
            'token' => $token,
            'user' => ['ID' => $user[0]['ID_Khach_Hang'], 'Email' => $user[0]['Email'], 'Role' => $user[0]['Roles']],
            'message' => 'Login successful'
        ]);

        header('/The-Ordinary/shop');

        echo '<pre>';
        print_r($token);
        echo '</pre>';
    }
}
