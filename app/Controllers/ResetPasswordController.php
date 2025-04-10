<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\User;

class ResetPasswordController {
    public function index() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/resetpassword.php';
        require 'app/Views/layouts/footer.php';
    }
}