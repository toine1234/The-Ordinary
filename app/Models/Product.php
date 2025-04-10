<?php
namespace App\Models;

class Product {
    public static function all() {
        return [
            ['name' => 'Sữa rửa mặt A', 'price' => 120000],
            ['name' => 'Kem dưỡng da B', 'price' => 250000],
            ['name' => 'Serum C', 'price' => 350000],
        ];
    }
}