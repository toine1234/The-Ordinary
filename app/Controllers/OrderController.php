<?php

namespace App\Controllers;


use App\Models\Cart;
use App\Models\Order;
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

    public function CreateOrder(){
        session_start();
        $userId= $_SESSION['idUser'];
        $shippingAddress = $_POST['shipping_address'];
        $paymentMethod = $_POST['payment_method'];
        $cost_ship = $_POST['cost_ship'];
        $total = $_POST['total'];

        $items = $_SESSION['cart'] ?? [];

        $orderId = Order::create($userId, $shippingAddress, $paymentMethod, $items, $cost_ship,$total);

        echo "Order is success";

    }
}
