<?php

function defineRoutes($router)
{
    // Home Route //
    $router->get('/', [App\Controllers\HomeController::class, 'index']);

    // Shop Route //
    $router->get('/shop', [App\Controllers\ShopController::class, 'index']);

    // Product Detail Route // 
    $router->get('/product', [App\Controllers\ProductController::class, 'detail']);

    // Auth Routes //
    $router->get('/login', [App\Controllers\AuthController::class, 'showLogin']);
    $router->post('/login', [App\Controllers\AuthController::class, 'login']);
    $router->get('/logout', [App\Controllers\AuthController::class, 'logout']);

    // Sign up  Routes //
    $router->get('/signup', [App\Controllers\SignupController::class, 'index']);
    $router->post('/signup', [App\Controllers\SignupController::class, 'signup']);

    // New Routes //
    $router->get('/new', [App\Controllers\NewController::class, 'index']);

    // Reset Password Routes //
    $router->get('/resetpassword', [App\Controllers\ResetPasswordController::class, 'index']);

    // Account Routes //
    $router->get('/account', [App\Controllers\UserController::class, 'index']);

    // Cart Routes //
    $router->get('/cart', [App\Controllers\CartController::class, 'index']);
    $router->post('/cart', [App\Controllers\CartController::class, 'addtocart']);
    $router->post('/cart/remove', [App\Controllers\CartController::class, 'RemoveCart']);

    // Edit Profile Routes //
    $router->get('/profile-edit', [App\Controllers\ProfileEditController::class, 'index']);
    $router->post('/profile-edit', [App\Controllers\ProfileEditController::class, 'editprofile']);

    // Edit Password Routes //
    $router->get('/password-edit', [App\Controllers\PasswordEditController::class, 'index']);
    $router->post('/password-edit', [App\Controllers\PasswordEditController::class, 'editpassword']);

    // Order Routes //
    $router->get('/order', [App\Controllers\OrderController::class, 'index']);
    $router->post('/order',[App\Controllers\OrderController::class,'CreateOrder']);
    $router->get('/orderStatus',[App\Controllers\OrderController::class,'ViewResultOrder']);

    // Admin Routes //
    $router->get('/admin',[App\Controllers\AdminController::class,'index']);
    $router->post('/admin/products',[App\Controllers\AdminController::class,'CRUD_Products']);
    $router->post('/admin/orders',[App\Controllers\AdminController::class,'CRUD_Orders']);

    // Paypal //
    $router->post('/paypal-verify',[App\Controllers\Paypal::class,'paypal_verify']);

    // Verify Emial //
    $router->get('/verifyEmail',[App\Controllers\VerifyEmailController::class,'Verify']);

    // Chat box //
    $router->post('/chatbox',[App\Controllers\ChatboxController::class,'AI']);
}
