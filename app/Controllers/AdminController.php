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
use App\Models\Home;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\Category;
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
        $orders = Order::getAllOrder(1)['result'];
        $total_order = Order::getAllOrder(1)['total_order'];
        $accounts = Account::getAllAccount();
        $monthlyData = Revenue::Revenue();
        $bestseller = Revenue::Bestsellers();
        $currentMonthlyData = Revenue::RevenueByMonth();
        $leastproduct = Revenue::LeastProduct();
        $total_quantity = Revenue::TotalQuantity();


        $store = Store::getAllStore();
        require_once __DIR__ . '/../Views/admin.php';

    }

    public function getHome()
    {
        $dataHome = Home::getDataHome();
        header('Content-Type: application/json');
        echo json_encode(value: $dataHome);
    }

    public function updateHome()
    {

        if (isset($_FILES['banner']) && $_FILES['banner']['error'] == 0) {
            $tmp_name = $_FILES['banner']['tmp_name'];
            $result = (new UploadApi())->upload($tmp_name, ['folder' => 'product_gallery']);


            $finalImage = $result['secure_url'];
        } else {
            $finalImage = $_POST['banner_old'];
        }

        $slider= $_POST['slider'];
        $finalSlider  = implode(";",$slider);

        $data = [
            "slider" => $finalSlider,
            "banner" => $finalImage,
            "heading" => $_POST['heading'],
            "caption" => $_POST['caption']
        ];

        Home::update($data);
        session_start();
        $_SESSION['flash'] = [
            'type' => 'success', // success, danger, warning, info
            'message' => 'Update is success'
        ];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function getCategory(){
        $dataCategory = Category::getCategory();
        header('Content-Type: application/json');
        echo json_encode(value: $dataCategory);
    }


    public function getStocks()
    {
        $stocks = Store::getAllStore();
        header('Content-Type: application/json');
        echo json_encode($stocks);
    }

    public function getProducts()
    {
        $page = $_POST['navigation'];
        $products = Product::getAllProductLimit($page)['result'];
        $total_page = Product::getAllProductLimit($page)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$products, $total_page]);
    }

    public function getOrders()
    {
        $page = $_POST['navigation'];
        $orders = Order::getAllOrder($page)['result'];
        $total_page = Order::getAllOrder($page)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$orders, $total_page]);
    }

    public function getDetailOrder()
    {
        $id = $_POST['id'];
        $order = Order::getDetailOrderById($id);

        header('Content-Type: application/json');
        echo json_encode($order);
    }

    public function searchOrder()
    {
        $id = $_POST['id'];
        $result = Order::SearchOrder($id);

        header('Content-Type: application/json');
        echo json_encode($result);

    }

    public function getOrderFilter()
    {
        $status = $_POST['status'];
        $result = Order::FilterStatus($status);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function getUsers()
    {
        $page = $_POST['navigation'];
        $data = Users::getAllUsers($page)['result'];
        $total_page = Users::getAllUsers($page)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$data, $total_page]);
    }

    public function searchCustomer()
    {
        $keyword = $_POST['keyword'];
        $data = Users::SearchUser($keyword, 1)['result'];
        $total_page = Users::SearchUser($keyword, 1)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$data, $total_page]);

    }

    public function sortCustomer()
    {
        $sort = $_POST['sort'];
        $data = Users::sortUser($sort, 1)['result'];
        $total_page = Users::sortUser($sort, 1)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$data, $total_page]);
    }

    public function filterCustomer()
    {
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        $data = Users::filterUser($gender, $status, 1)['result'];
        $total_page = Users::filterUser($gender, $status, 1)['total_page'];

        header('Content-Type: application/json');
        echo json_encode([$data, $total_page]);
    }

    public function getCustomerDetail()
    {
        $id = $_POST['id'];

        $data = Users::getDetailUser($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function CRUD_Products()
    {

        if (isset($_POST['update']) && $_POST['update'] === 'update') {
            $data = [
                "id" => $_POST['id_product'],
                "name" => $_POST['name_product'],
                "description" => $_POST['description_product'],
                "price" => $_POST['price_product'],
                "quantity" => isset($_POST['quantity_product']) ? isset($_POST['quantity_product']) : 0,
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
                header('Location:' . $_SERVER['HTTP_REFERER']);
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
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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

                Order::UpdateStatus($_POST['id_order'], $_POST['update']);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Update order status is success!'
                ];
                exit;
            } catch (\Exception $e) {
                session_start();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                $_SESSION['flash'] = [
                    'type' => 'warning', // success, danger, warning, info
                    'message' => 'Update order is fail!'
                ];
            }
        }

        if (isset($_POST['delete']) && $_POST['delete'] === 'delete') {
            try {
                Order::delete($_POST['id_order']);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                session_start();
                $_SESSION['flash'] = [
                    'type' => 'success', // success, danger, warning, info
                    'message' => 'Delete order status is success!'
                ];
                exit;
            } catch (\Exception $e) {
                session_start();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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