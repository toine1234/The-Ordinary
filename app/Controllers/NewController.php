<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class NewController {
    public function index() {
        session_start();

        require 'app/Views/layouts/header.php';
        require 'app/Views/new.php';
        require 'app/Views/layouts/footer.php';
    }
}