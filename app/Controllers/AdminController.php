<?php
namespace App\Controllers;
use App\Middlewares\AuthMiddleware;
use App\Models\Revenue;
use App\Models\Users;
use App\Models\Account;
use App\Models\Product;
use App\Core\JWT;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Order;

class AdminController
{
    public function index()
    {
        session_start();
        $jwt_decode = AuthMiddleware::AuthJWT();
        if (!$jwt_decode) {
            header('Location: /The-Ordinary/login');
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login'
            ];
            exit;
        }

        $products = Product::getAllProducts();
        $orders = Order::getAllOrder();
        $users = Users::getAllUsers();
        $accounts = Account::getAllAccount();
        $monthlyData = Revenue::Revenue();
        $bestseller = Revenue::Bestsellers();
        $leastproduct = Revenue::LeastProduct();
        $total_quantity = Revenue::TotalQuantity();

        if (isset($_GET['search'])){
            
            $products = Product::SearchProduct($_GET['search']);
            $users = Users::SearchUser($_GET['search']);
            $accounts = Account::SearchAccount($_GET['search']);
            $orders = Order::SearchOrder($_GET['search']);
        }

        if (isset($_GET['sort'])){
            $products = Product::getSortedProducts($_GET['sort']);
        }

        if (isset($_GET['filter'])){
            $orders = Order::FilterStatus($_GET['filter']);
        }


        $store = Store::getAllStore();

        if (isset($_GET['view'])){
            $product = Product::getProductsById($_GET['view']);
            $detailOrders = Order::getDetailOrderById($_GET['view']);
            
        }

        
        
        require_once __DIR__ . '/../Views/admin.php';
        
    }

    public function CRUD_Products(){

        if (isset($_POST['update']) && $_POST['update']==='update'){
            $data = [
                "id"=>$_POST['id_product'],
                "name"=>$_POST['name_product'],
                "description"=>$_POST['description_product'],
                "price"=>$_POST['price_product'],
                "quantity"=>$_POST['quantity_product'],
                "size"=>$_POST['size_product'],
                "targets"=>$_POST['targets_product'],
                "format"=>$_POST['format_product'],
                "suited"=>$_POST['suited_product'],
                "key_ingredients"=>$_POST['ingredients_product']
            ];
            try{
                $newQuantityStore = Store::getQuantityById($data['id'])['SL'] - $data['quantity'];
                Store::updateQuantity($data['id'],$newQuantityStore);
                Product::Update($data);
                header('Location: /The-Ordinary/admin?page=Products&view='.$_POST['id_product']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Update product is success!'
                ];
                exit;
            }
            catch(\Exception $e){
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Update product is fail!'
                ];
            }
            
        }

        if (isset($_POST['create']) && $_POST['create']==='create'){
            $data = [
                "price_store"=>$_POST['price_store'],
                "quantity_store"=>$_POST['quantity_store'],
                "producer_store"=>$_POST['producer_store'],
                "exp"=>$_POST['exp_store'],
                "mfg"=>$_POST['mfg_store'],
                "name"=>$_POST['name_product'],
                "description"=>$_POST['description_product'],
                "price"=>$_POST['price_product'],
                "quantity"=>$_POST['quantity_product'],
                "size"=>$_POST['size_product'],
                "targets"=>$_POST['targets_product'],
                "format"=>$_POST['format_product'],
                "suited"=>$_POST['suited_product'],
                "key_ingredients"=>$_POST['ingredients_product']
            ];

            try{
                Product::Create($data);
                header('Location: /The-Ordinary/admin?page=Products');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Create product is success!'
                ];
                exit;
            }
            catch(\Exception $e){
                echo $e;
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Create product is fail!'
                ];
            }
        }

        if (isset($_POST['delete']) && $_POST['delete']==='delete'){

            $id = $_POST['id_product'];

            try{
                Cart::deleteByIdProduct($id);
                Product::delete($id);
                header('Location: /The-Ordinary/admin?page=Products');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Delete product is success!'
                ];
                exit;
            }
            catch(\Exception $e){
                echo $e;
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Delete product is fail!'
                ];
            }
        }
    }

    public function CRUD_Orders(){

        if (isset($_POST['update']) && $_POST['update']==='update'){
            try{
                Order::UpdateStatus($_POST['id_order']);
                header('Location: /The-Ordinary/admin?page=Orders&view='.$_POST['id_order']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Update order status is success!'
                ];
                exit;
            }
            catch(\Exception $e){
                session_start();
                header('Location: /The-Ordinary/admin?page=Orders&view='.$_POST['id_order']);
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Update order is fail!'
                ];
            }
        }

        if (isset($_POST['delete']) && $_POST['delete']=== 'delete'){
            try{
                Order::delete($_POST['id_order']);
                header('Location: /The-Ordinary/admin?page=Orders');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Delete order status is success!'
                ];
                exit;
            }
            catch(\Exception $e){
                session_start();
                header('Location: /The-Ordinary/admin?page=Orders&view='.$_POST['id_order']);
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Delete order is fail!'
                ];
            }
        }
        
    }

}