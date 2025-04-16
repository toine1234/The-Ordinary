<?php
namespace App\Controllers;
use App\Models\Cart;

class CartController
{
    public function index()
    {
        session_start();
        $user = $_SESSION['user'];
        $cartItems = Cart::get_cart($user['ID_Khach_Hang']);
    }

    public function addtocart()
    {
        session_start();
        $user_id = $_SESSION['idUser'];
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'] ?? 1; // Default quantity is 1 if not provided

        try {
            Cart::CreateCart($user_id, $productId, $quantity);
            session_start();
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Add to cart is success!'
            ];
            $cartItems = Cart::get_cart( $user_id );
            $_SESSION['cart'] = $cartItems;
            header('Location: /The-Ordinary/shop');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function RemoveCart(){
        session_start();
        $user_id = $_SESSION['idUser'];
        $cartId = $_POST['cartId'];
        try{
            cart::delete( $cartId );
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Remove cart is success!'
            ];
            $cartItems = Cart::get_cart( $user_id );
            $_SESSION['cart'] = $cartItems;
            header('Location: /The-Ordinary/shop');
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        
    }

    
}
?>