<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;
use App\Models\Feedback;

class ProductController {
    public function index() {
        session_start();
        if (isset($_GET['id'])) {
            $product = Product::getProductsById($_GET['id']);
            $feedbacks = Feedback::getFeedback($_GET['id']);

            if (!$product) {
            
                echo "Product not found.";
                return;
            }
        }
        

        require 'app/Views/layouts/header.php';
        require 'app/Views/product.php';
        require 'app/Views/layouts/footer.php';

    }

    public function search(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] :'';
        
        $data = Product::SearchProduct($keyword);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function sort(){
        $sort = isset($_POST['sort']) ? $_POST['sort'] :'';

        $data = Product::Sort($sort);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function category(){
        $cate[] = isset($_POST['cate']) ? $_POST['cate'] :'';

        $data = Product::getProductCategory($cate,1)['result'];
        $total_page = Product::getProductCategory($cate,1)['total_page'];
        header('Content-Type: application/json');
        echo json_encode([$data,$total_page]);
    }

    public function getDetailProduct(){
        $id = isset($_POST['id']) ? $_POST['id'] :0;

        $data = Product::getProductsById($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}