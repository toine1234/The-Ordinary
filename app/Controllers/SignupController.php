<?php
namespace App\Controllers;

use App\Models\Users;

class SignupController
{
    public function index()
    {
        require 'app/Views/layouts/header.php';
        require 'app/Views/signup.php';
        require 'app/Views/layouts/footer.php';
    }

    public function signup()
    {
        $email = $_POST['email'] ?? '';
        $password = trim($_POST['password'] ?? '');

        if (!$email || !$password) {
            echo "Vui lòng nhập đầy đủ thông tin.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = Users::createUser($email, $hashedPassword);
        session_start();
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Sign up is success!'
        ];

        header('Location: /The-Ordinary/login');
        exit;
    }
}