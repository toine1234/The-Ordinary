<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
use App\Models\Product;

class ShopController {
    public function index() {
        session_start();
        $page = isset( $_GET['page'] ) ? $_GET['page'] :1;

        $products = Product::getAllProductLimit($page)['result'];
        $total_pages = Product::getAllProductLimit($page)['total_page'];

        if (isset($_GET['type'])) {
            $filters = isset($_GET['type']) ? $_GET['type'] : [];

            if (!is_array($filters)){
                $filters = [$filters];
            }

            $products = Product::getFilteredProducts($filters);
            
        }

        if (isset($_GET['cate'])) {
            $products = Product::getProductCategory($_GET['cate']);
        }

        if (isset($_GET['sort'])) {
            $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
            $products = Product::getSortedProducts($sort);

        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $products = Product::SearchProduct($search);
        }

        

        // $filters = isset($_GET['type']) ? $_GET['type'] : [];
        // if (!is_array($filters)) {
        //     $filters = [$filters];
        // }

        // $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
        // $products = Product::getSortedProducts($sort);
        // $products = Product::getFilteredProducts($filters);
        
        require 'app/Views/layouts/header.php';
        require 'app/Views/shop.php';
        require 'app/Views/layouts/footer.php';
    }

    
}