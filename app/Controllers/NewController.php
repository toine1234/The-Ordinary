<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Poduct;

class NewController {
    public function index() {
        require 'app/Views/layouts/header.php';
        require 'app/Views/new.php';
        require 'app/Views/layouts/footer.php';
    }
}