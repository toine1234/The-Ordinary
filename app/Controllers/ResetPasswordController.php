<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\User;
use App\Core\EmailHandle;
use App\Models\Account;

class ResetPasswordController {
    public function index() {
        session_start();
        require 'app/Views/layouts/header.php';
        require 'app/Views/resetpassword.php';
        require 'app/Views/layouts/footer.php';
    }

    public function resetpassword(){
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(32));
        $tokenExpireAt = date('Y-m-d H:i:s', strtotime('+24 hours'));
        $user = Account::findByEmail( $email );
        if( $user ){
            try {
            Account::updateToken($email, $token,$tokenExpireAt);
            EmailHandle::sendVerificationEmail($email, $token, 'resetpassword');
            header('Location: '. $_SERVER['HTTP_REFERER']);
            }
            catch(\Exception $e){
                echo $e->getMessage();
            }
        }
        else{
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Email is invalid'
            ];
            exit;
        }


    }

    public function updatepassword(){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comfirmpassword = $_POST['comfirmPassword'];
        if ( $comfirmpassword != $password ) {
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Comfirm Password is not match'
            ];
            header('Location: '. $_SERVER['HTTP_REFERER']);
            exit;
        }
        Account::changePassword(null,password_hash($password,PASSWORD_BCRYPT),$email);
        $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Reset password is success'
            ];
            header('Location: /The-Ordinary/login');
    }   
}