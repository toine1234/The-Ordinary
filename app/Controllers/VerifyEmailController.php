<?php 
namespace App\Controllers;
use App\Models\Account;

class VerifyEmailController{

    public static function Verify(){
        $email = $_GET['email'] ?? '';
        $token = $_GET['token'] ?? '';

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
                'message' => 'Confirmation successful! You can log in.'
            ];

            header('Location: /The-Ordinary/login');
        
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