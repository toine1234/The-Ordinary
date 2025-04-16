<?php
namespace App\Controllers;
use App\Models\Cart;
use App\Core\JWT;
class HomeController
{
    public function index()
    {
        session_start();
        if (isset($_COOKIE['accessToken'])){
            
            JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
            $info = JWT::verify($_COOKIE['accessToken']);   
            $_SESSION['idUser'] = $info->ID;
            $cartItems = Cart::get_cart($info->ID);
            $_SESSION['cart'] = $cartItems;
        }

        else{
            unset($_SESSION['idUser']);
            unset($_SESSION['cart']);
        }
        
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/home.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
