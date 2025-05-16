<?php
namespace App\Core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailHandle{
    public static function sendVerificationEmail($email, $token, $type) {
        $mail = new PHPMailer(true);
    
        try {
            // Cấu hình server SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true; 
            $mail->Username   = 'dinhvanhuy.04032019@gmail.com'; 
            $mail->Password   = 'zfnp vspa oeei lzyq';    
            $mail->SMTPSecure = 'tls'; 
            $mail->Port       = 587;
    
            // Người gửi và người nhận
            $mail->setFrom('dinhvanhuy.04032019@gmail.com', 'The Ordinary');
            $mail->addAddress($email);
    
            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Confirm account registration';
            $verificationLink = "http://localhost/The-Ordinary/verifyEmail?email=" . urlencode($email) . "&token=" . urlencode($token) . "&type=".urlencode($type);
            if ($type == 'signup'){
                $mail->Body    = "
                    <h1>Confirm account registration</h1>
                    <p>Click the link below to activate your account:</p>
                    <a href=".$verificationLink.">".$verificationLink."</a>";
                $mail->AltBody = "Please visit the following link to confirm: $verificationLink";
            }

            if ($type == "resetpassword"){
                $mail->Body    = "
                    <h1>Reset Password For The Ordinary</h1>
                    <p>Click the link below to reset password:</p>
                    <a style='border:1px solid black;padding:10px;position:absolute;text-decoration:none;color:black' href=".$verificationLink.">RESET PASSWORD</a>";
                $mail->AltBody = "Please visit the following link to confirm: $verificationLink";
            }
    
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}