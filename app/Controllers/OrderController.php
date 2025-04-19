<?php

namespace App\Controllers;

use App\Models\Account;
use App\Core\JWT;
use App\Models\Cart;

class OrderController
{
    public function index()
    {
        session_start();
        // if (isset($_GET['id'])) {
        //     $product = Product::getProductsById($_GET['id']);

        //     if (!$product) {

        //         echo "Product not found.";
        //         return;
        //     }
        // }


        require 'app/Views/layouts/header.php';
        require 'app/Views/order.php';
        require 'app/Views/layouts/footer.php';
    }
}
