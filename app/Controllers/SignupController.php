<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\User;

class SignupController {
    public function index() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/signup.php';
        require 'app/Views/layouts/footer.php';
    }
}