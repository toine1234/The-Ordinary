<?php
namespace App\Controllers;
use App\Models\Cart;

class CartController
{
    public function index()
    {
        session_start();
        $user = $_SESSION['idUser'];
        $cartItems = Cart::get_cart($user);


        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/cart.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function CRUD_Cart()
    {
        if (isset($_POST['remove'])) {
            session_start();
            $user_id = $_SESSION['idUser'];
            $cartId = $_POST['cartId'];
            try {
                cart::delete($cartId);
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Remove cart is success!'
                ];
                $cartItems = Cart::get_cart($user_id);
                $_SESSION['cart'] = $cartItems;
                header('Location: /The-Ordinary/cart');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        if (isset($_POST['update'])) {
            session_start();
            $user_id = $_SESSION['idUser'];
            $cartId = $_POST['cartId'];
            $quantity = (int) $_POST['quantity'];
            echo "<pre>";
            echo printf($quantity);
            echo "</pre>";
            try {
                cart::update($cartId, $quantity);
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Remove cart is success!'
                ];
                $cartItems = Cart::get_cart($user_id);
                $_SESSION['cart'] = $cartItems;
                header('Location: /The-Ordinary/cart');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        if (isset($_POST['create'])) {
            if (isset($_COOKIE['accessToken'])) {
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
                    $cartItems = Cart::get_cart($user_id);
                    $_SESSION['cart'] = $cartItems;
                    header('Location: /The-Ordinary/shop');
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Please login to add to cart!'
                ];
                header('Location: /The-Ordinary/login');
            }
        }
    }

    public function addtocart()
    {
        if (isset($_COOKIE['accessToken'])) {
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
                $cartItems = Cart::get_cart($user_id);
                $_SESSION['cart'] = $cartItems;
                header('Location: /The-Ordinary/shop');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login to add to cart!'
            ];
            header('Location: /The-Ordinary/login');
        }
    }

    public function RemoveCart()
    {
        session_start();
        $user_id = $_SESSION['idUser'];
        $cartId = $_POST['cartId'];
        try {
            cart::delete($cartId);
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Remove cart is success!'
            ];
            $cartItems = Cart::get_cart($user_id);
            $_SESSION['cart'] = $cartItems;
            header('Location: /The-Ordinary/cart');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }


}
?>