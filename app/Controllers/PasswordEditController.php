<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\Users;

class PasswordEditController {
    public function index() {
        session_start();
        $id = $_SESSION["idUser"];
        $profile = Users::getUserById( $id );

        require 'app/Views/layouts/header.php';
        require 'app/Views/password-edit.php';
        require 'app/Views/layouts/footer.php';
    }

    // public function editpassword() {
        
    // }
}