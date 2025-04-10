<?php
namespace App\Controllers;

class AuthController {
    public function showLogin() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/login.php';
        require 'app/Views/layouts/footer.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === 'admin' && $password === '123456') {
            echo "Đăng nhập thành công!";
        } else {
            echo "Sai tài khoản hoặc mật khẩu!";
        }
    }
}
