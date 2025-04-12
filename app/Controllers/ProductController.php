<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class ProductController {
    public function detail() {
        if (isset($_GET['id'])) {
            $product = Product::getProductsById($_GET['id']);

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