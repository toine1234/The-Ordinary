<?php
namespace App\Controllers;

use App\Models\Account;

class AccountController
{
    public function index(){
        if (isset($_GET['id'])) {
            $account = Account::getAccountById($_GET['id']);

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
