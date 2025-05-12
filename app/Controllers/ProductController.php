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
}