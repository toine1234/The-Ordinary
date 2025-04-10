<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/home.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
