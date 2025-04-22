<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class NewController {
    public function index() {
        $products = Product::getFilteredProducts([
            'Serum',
            'Moisturizer',
            'Cleanser',
            'Sunscreen'
        ]);

        require 'app/Views/layouts/header.php';
        require 'app/Views/new.php';
        require 'app/Views/layouts/footer.php';
    }
}