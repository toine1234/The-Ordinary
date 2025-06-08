<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\Users;
use App\Models\Account;

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
        $newEmail = $_POST['email'];
        $phone = $_POST['phone'];
        $comfirmEmail = $_POST['comfirm-email'];
        $password = $_POST['password'];

        $account =  Account::findByID($id);

        if (!password_verify($password,$account[0]['Password'])){
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Password is incorrect!'
            ];
            header('Location: /The-Ordinary/profile-edit');
            return;
        }

        if ($newEmail !== $comfirmEmail){
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Email Comfirm is not matching!'
            ];
            header('Location: /The-Ordinary/profile-edit');
            return;
        }

        try{
            Users::updateUser($id, $fullname, $phone, $newEmail);
            $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Edit profile is success!'];
            header('Location: /The-Ordinary/account?page=account');
            
        }catch( \Exception $e ){
            $_SESSION['flash'] = [
            'type' => 'warning', // success, danger, warning, info
            'message' => 'Edit profile is unsuccess!'];
        }
        
    }
}