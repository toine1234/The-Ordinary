<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\User;

class ProfileEditController {
    public function index() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/profile-edit.php';
        require 'app/Views/layouts/footer.php';
    }
}