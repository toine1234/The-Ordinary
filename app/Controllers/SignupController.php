<?php
namespace App\Controllers;

use App\Models\Account;
use App\Core\EmailHandle;
use App\Validators\SignupValidation;

class SignupController
{
    public function index()
    {
        session_start();
        require 'app/Views/layouts/header.php';
        require 'app/Views/signup.php';
        require 'app/Views/layouts/footer.php';
    }

    public function signup()
    {
        $email = $_POST['email'] ?? '';
        $password = trim($_POST['password'] ?? '');
        $comfirmPassword = trim($_POST['confirm-password'] ??'');
        $phone = $_POST['phone'] ?? '';
        $fullname = $_POST['name'] ?? '';
        
        $token = bin2hex(random_bytes(32)); 
        $tokenExpireAt = date('Y-m-d H:i:s', strtotime('+24 hours'));

       
        $Validator = new SignupValidation();
        $errors = $Validator->Validate($email, $password,$phone, $comfirmPassword);
       

        if ($errors['count'] > 0) {
            session_start();
            $_SESSION['Validations'] = $errors;
            header('Location: /The-Ordinary/signup');
            return;
        }
        

        if (!$email || !$password) {
            echo "Vui lòng nhập đầy đủ thông tin.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $id = Account::generateUUID();
        try{
            $account = Account::createAccount($id,$email, $hashedPassword,$token,$tokenExpireAt);
            $user = Account::createUser($id,$email, $fullname,$phone);
            EmailHandle::sendVerificationEmail($email,$token,'signup');
             
            session_start();
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Sign up is success!, please comfirm Email'
            ];

            header('Location: /The-Ordinary/login');
            exit;
        }
        catch(\Exception $e){

            echo $e->getMessage();
        }
       
    }
}