<?php

namespace App\Controllers;


use App\Models\Cart;
use App\Models\Users;

class OrderController
{
    public function index()
    {
        session_start();
        $user = $_SESSION['idUser'];
        $cartItems = Cart::get_cart($user);
        $user_info = Users::getUserById($user);

        require 'app/Views/layouts/header.php';
        require 'app/Views/order.php';
        require 'app/Views/layouts/footer.php';
    }
}
