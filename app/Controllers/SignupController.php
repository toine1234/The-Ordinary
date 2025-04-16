<?php
namespace App\Controllers;

use App\Models\Users;

class SignupController
{
    public function index()
    {
        session_start();
        require 'app/Views/layouts/header.php';
        require 'app/Views/signup.php';
        require 'app/Views/layouts/footer.php';
    }

    public function signup()
    {
        $email = $_POST['email'] ?? '';
        $password = trim($_POST['password'] ?? '');
        $phone = $_POST['phone'] ?? '';
        $fullname = $_POST['name'] ?? '';

        if (!$email || !$password) {
            echo "Vui lòng nhập đầy đủ thông tin.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $id = Users::generateUUID();
        $account = Users::createAccount($id,$email, $hashedPassword);
        $user = Users::createUser($id,$email, $fullname,$phone);
        session_start();
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Sign up is success!'
        ];

        header('Location: /The-Ordinary/login');
        exit;
    }
}