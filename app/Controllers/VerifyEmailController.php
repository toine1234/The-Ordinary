<?php 
namespace App\Controllers;
use App\Models\Account;

class VerifyEmailController{

    public static function Verify(){
        $email = $_GET['email'] ?? '';
        $token = $_GET['token'] ?? '';
        $type = $_GET['type'] ?? '';

        if (!$email || !$token) {
            exit("Link xác nhận không hợp lệ.");
        }

        $user = Account::checkToken($email,$token);
        $now = date('Y-m-d H:i:s');
        if ($user){
            if ($user[0]['token_expire_at'] < $now) {
                echo "Token đã hết hạn. <a href='resend.php?email=" . urlencode($email) . "'>Gửi lại email xác nhận</a>";
                exit;
            }

            Account::updateVerifedAccount($email);
            session_start();
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Confirmation successful!'
            ];

            if ($type == 'signup'){
                header('Location: /The-Ordinary/login');
            }

            if ($type == 'resetpassword'){
                header('Location: /The-Ordinary/resetpassword?token='.urldecode($token).'&email='.urlencode($email));
            }
            
        
        }
        else{
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Invalid confirmation link.'
            ];

            header('Location: /The-Ordinary/login');
        }
        
    }
}