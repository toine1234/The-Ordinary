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
use App\Models\Feedback;
use App\Core\EmailHandle;

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

        $orders = Order::getAllOrder();
        $users = Users::getAllUsers();
        $accounts = Account::getAllAccount();
        $monthlyData = Revenue::Revenue();
        $bestseller = Revenue::Bestsellers();
        $currentMonthlyData = Revenue::RevenueByMonth();
        $leastproduct = Revenue::LeastProduct();
        $total_quantity = Revenue::TotalQuantity();

        if (isset($_GET['search'])) {
            $accounts = Account::SearchAccount($_GET['search']);
            $orders = Order::SearchOrder($_GET['search']);
        }

        if (isset($_GET['sort'])) {
            $products = Product::Sort($_GET['sort']);
        }

        if (isset($_GET['filter'])) {
            $orders = Order::FilterStatus($_GET['filter']);
        }


        $store = Store::getAllStore();

        if (isset($_GET['view'])) {
            $product = Product::getProductsById($_GET['view']);
            $detailOrders = Order::getDetailOrderById($_GET['view']);
            $users = Users::SearchUser($_GET['view']);
            $order = Order::getAllOrderByUser($_GET['view']);
            $feedbacks = Feedback::getFeedbackByUser($_GET['view']);

        }



        require_once __DIR__ . '/../Views/admin.php';

    }

    public function getStocks(){
        $stocks = Store::getAllStore();
        header('Content-Type: application/json');
        echo json_encode($stocks);
    }

    public function getProducts(){
        $products = Product::getAllProducts();
        header('Content-Type: application/json');
        echo json_encode($products);
    }

    public function CRUD_Products()
    {

        if (isset($_POST['update']) && $_POST['update'] === 'update') {
            $data = [
                "id" => $_POST['id_product'],
                "name" => $_POST['name_product'],
                "description" => $_POST['description_product'],
                "price" => $_POST['price_product'],
                "quantity" => $_POST['quantity_product'],
                "size" => $_POST['size_product'],
                "targets" => $_POST['targets_product'],
                "format" => $_POST['format_product'],
                "suited" => $_POST['suited_product'],
                "key_ingredients" => $_POST['ingredients_product']
            ];
            try {
                $newQuantityStore = Store::getQuantityById($data['id'])['SL'] - $data['quantity'];
                Store::updateQuantity($data['id'], $newQuantityStore);
                Product::Update($data);
                header('Location: /The-Ordinary/admin?page=Products&view=' . $_POST['id_product']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Update product is success!'
                ];
                exit;
            } catch (\Exception $e) {
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Update product is fail!'
                ];
            }

        }

        if (isset($_POST['create']) && $_POST['create'] === 'create') {
            $data = [
                "price_store" => $_POST['price_store'],
                "quantity_store" => $_POST['quantity_store'],
                "producer_store" => $_POST['producer_store'],
                "exp" => $_POST['exp_store'],
                "mfg" => $_POST['mfg_store'],
                "name" => $_POST['name_product'],
                "description" => $_POST['description_product'],
                "price" => $_POST['price_product'],
                "quantity" => $_POST['quantity_product'],
                "size" => $_POST['size_product'],
                "targets" => $_POST['targets_product'],
                "format" => $_POST['format_product'],
                "suited" => $_POST['suited_product'],
                "key_ingredients" => $_POST['ingredients_product']
            ];

            try {
                Product::Create($data);
                header('Location: /The-Ordinary/admin?page=Products');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Create product is success!'
                ];
                exit;
            } catch (\Exception $e) {
                echo $e;
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Create product is fail!'
                ];
            }
        }

        if (isset($_POST['delete']) && $_POST['delete'] === 'delete') {

            $id = $_POST['id_product'];

            try {
                Cart::deleteByIdProduct($id);
                Product::delete($id);
                header('Location: /The-Ordinary/admin?page=Products');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Delete product is success!'
                ];
                exit;
            } catch (\Exception $e) {
                echo $e;
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => 'Delete product is fail!'
                ];
            }
        }
    }

    public function CRUD_Orders()
    {

        if (isset($_POST['update'])) {
            try {

                Order::UpdateStatus($_POST['id_order'],$_POST['update']);
                header('Location: /The-Ordinary/admin?page=Orders&view=' . $_POST['id_order']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Update order status is success!'
                ];
                exit;
            } catch (\Exception $e) {
                session_start();
                header('Location: /The-Ordinary/admin?page=Orders&view=' . $_POST['id_order']);
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Update order is fail!'
                ];
            }
        }

        if (isset($_POST['delete']) && $_POST['delete'] === 'delete') {
            try {
                Order::delete($_POST['id_order']);
                header('Location: /The-Ordinary/admin?page=Orders');
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Delete order status is success!'
                ];
                exit;
            } catch (\Exception $e) {
                session_start();
                header('Location: /The-Ordinary/admin?page=Orders&view=' . $_POST['id_order']);
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Delete order is fail!'
                ];
            }
        }

    }

    public function ManageSatusAccount()
    {
        if (isset($_POST['block']) && $_POST['block'] === 'block') {
            try {
                Account::updateSatusAccount($_POST['id'], 'Blocked');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Blocked this account!'
                ];
            } catch (\Exception $e) {
                session_start();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => $e
                ];
            }
        }


        if (isset($_POST['unblock']) && $_POST['unblock'] === 'unblock') {

            try {
                Account::updateSatusAccount($_POST['id'], 'Active');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Unblocked this account!'
                ];
            } catch (\Exception $e) {
                session_start();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                $_SESSION['flash'] = [
                    'type' => 'danger', // success, danger, warning, info
                    'message' => $e
                ];
            }
        }
    }

    public function sendMail()
    {
        $sender = isset($_POST['mailsender']) ? $_POST['mailsender'] : '';
        $receiver = isset($_POST['mailreceiver']) ? $_POST['mailreceiver'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        try {
            EmailHandle::sendMail($sender, $receiver, $title, $content);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            session_start();
            $_SESSION['flash'] = [
                'type' => 'success', // success, danger, warning, info
                'message' => 'Send Mail is success'
            ];
        } catch (\Exception $e) {
            session_start();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            $_SESSION['flash'] = [
                'type' => 'danger', // success, danger, warning, info
                'message' => $e
            ];
        }
    }


}