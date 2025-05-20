<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;
use App\Models\Feedback;

class ProductController {
    public function detail() {
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
}