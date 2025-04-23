<?php
namespace App\Controllers;
use App\Models\Users;
use App\Models\Account;
use App\Models\Product;
use App\Core\JWT;
use App\Models\Store;

class AdminController
{
    public function index()
    {
        session_start();
        if (!isset($_COOKIE["accessToken"])) {
            header('Location: /The-Ordinary/login');
            session_start();
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => 'Please login'
            ];
            exit;
        }

        $products = Product::getAllProducts();
        $store = Store::getAllStore();

        if (isset($_GET['view'])){
            $product = Product::getProductsById($_GET['view']);
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
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Create product is fail!'
                ];
            }
        }
    }

}