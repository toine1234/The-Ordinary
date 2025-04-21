<?php

namespace App\Controllers;


use App\Models\Cart;

class OrderController
{
    public function index()
    {
        session_start();
        $user = $_SESSION['idUser'];
        $cartItems = Cart::get_cart($user);

        require 'app/Views/layouts/header.php';
        require 'app/Views/order.php';
        require 'app/Views/layouts/footer.php';
    }
}
