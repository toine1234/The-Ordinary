<?php

function defineRoutes($router) {
    $router->get('/', [App\Controllers\HomeController::class, 'index']);
    $router->get('/shop', [App\Controllers\ShopController::class, 'index']);
    $router->get('/login', [App\Controllers\AuthController::class, 'showLogin']);
    $router->post('/login', [App\Controllers\AuthController::class, 'login']);
    $router->get('/signup', [App\Controllers\SignupController::class, 'index']);
    $router->get('/new', [App\Controllers\NewController::class, 'index']);
    $router->get('/resetpassword', [App\Controllers\ResetPasswordController::class, 'index']);
}