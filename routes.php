<?php

function defineRoutes($router) {
    $router->get('/', [App\Controllers\HomeController::class, 'index']);
    $router->get('/shop', [App\Controllers\ShopController::class, 'index']);
    $router->get('/product', [App\Controllers\ProductController::class, 'detail']);
    $router->get('/login', [App\Controllers\AuthController::class, 'showLogin']);
    $router->post('/login', [App\Controllers\AuthController::class, 'login']);
    $router->get('/signup', [App\Controllers\SignupController::class, 'index']);
    $router->post('/signup', [App\Controllers\SignupController::class, 'signup']);
    $router->get('/new', [App\Controllers\NewController::class, 'index']);
    $router->get('/resetpassword', [App\Controllers\ResetPasswordController::class, 'index']);
    $router->get('/account', [App\Controllers\AccountController::class, 'index']);
    $router->post('/cart', [App\Controllers\CartController::class, 'addtocart']);
    $router->post('/cart/remove', [App\Controllers\CartController::class, 'RemoveCart']);
    
}