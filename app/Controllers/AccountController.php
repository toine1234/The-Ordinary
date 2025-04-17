<?php
namespace App\Controllers;

use App\Models\Account;

class AccountController
{
    public function index(){
        session_start();
        if (isset($_SESSION['idUser'])) {
            $account = Account::getAccountById($_SESSION['idUser']);

            if (!$account) {
            
                echo "Account not found.";
                return;
            }
        }

        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/account.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
