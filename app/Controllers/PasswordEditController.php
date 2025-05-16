<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Users.php';
use App\Models\Account;

class PasswordEditController {
    public function index() {
        session_start();
        require 'app/Views/layouts/header.php';
        require 'app/Views/password-edit.php';
        require 'app/Views/layouts/footer.php';
    }

    public function editpassword() {
        session_start();
        $id = $_SESSION['idUser'];
        $curentPassword = $_POST['current-password'];
        $newPassword = $_POST['new-password'];
        $newPasswordConfirm = $_POST['confirm-new-password'];
        $user = Account::findByID($id);

        if (!password_verify($curentPassword, $user[0]['Password'])){
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Password is incorrect!'
            ];
            header('Location: /The-Ordinary/password-edit');
            return;
        }

        if ($newPassword !== $newPasswordConfirm){
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Password Comfirm is not matching!'
            ];
            header('Location: /The-Ordinary/password-edit');
            return;
        }

        Account::changePassword($id,  password_hash($newPassword,PASSWORD_BCRYPT),null);
        http_response_code(202);
        echo json_encode(['message'=> 'chang password success']);
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Change Password is success'
        ];
        header('Location: /The-Ordinary/account');
    }

}