<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\Users;

class ProfileEditController {
    public function index() {
        session_start();
        $id = $_SESSION["idUser"];
        $profile = Users::getUserById( $id );

        require 'app/Views/layouts/header.php';
        require 'app/Views/profile-edit.php';
        require 'app/Views/layouts/footer.php';
    }

    public function editprofile() {
        session_start();
        $id = $_SESSION["idUser"];
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        try{
            Users::updateUser($id, $fullname, $phone, $email);
            $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Edit profile is success!'];
            header('Location: /The-Ordinary/account');
            
        }catch( \Exception $e ){
            $_SESSION['flash'] = [
            'type' => 'warning', // success, danger, warning, info
            'message' => 'Edit profile is unsuccess!'];
        }
        
    }
}