<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class ShopController {
    public function index() {
        $products = Product::getAllProducts();
        $filters = isset($_GET['type']) ? $_GET['type'] : [];
        if (!is_array($filters)) {
            $filters = [$filters];
        }

        $products = Product::getFilteredProducts($filters);
        require 'app/Views/layouts/header.php';
        require 'app/Views/shop.php';
        require 'app/Views/layouts/footer.php';
    }

    
}