<?php
namespace App\Controllers;
use App\Models\Vouchers;

class VoucherController{
    public function getVoucherByCode(){
        if (!isset($_POST['voucher'])){
            header('Location: /The-Ordinary/order');
            exit();
        }

        $code = $_POST['voucher'];
        $endow = Vouchers::get($code);
        if (!$endow){
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Voucher Code is invalid'
            ];
            header('Location: /The-Ordinary/order');
            exit();
        }
        session_start();
        $_SESSION['voucher'] = $endow;
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Voucher Applied'
            ];
        header('Location: /The-Ordinary/order');
    }
}