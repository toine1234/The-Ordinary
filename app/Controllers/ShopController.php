<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class ShopController {
    public function index() {
        $products = Product::all();
        require 'app/Views/layouts/header.php';
        require 'app/Views/shop.php';
        require 'app/Views/layouts/footer.php';
    }
}