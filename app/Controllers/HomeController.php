<?php
namespace App\Controllers;
use App\Models\Cart;
use App\Core\JWT;
class HomeController
{
    public function index()
    {
        if (isset($_COOKIE['accessToken'])){
            session_start();
            JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
            $info = JWT::verify($_COOKIE['accessToken']);   
            $_SESSION['idUser'] = $info->ID;
            $cartItems = Cart::get_cart($info->ID);
            $_SESSION['cart'] = $cartItems;
        }
        
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/home.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
