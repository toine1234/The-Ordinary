<?php

function defineRoutes($router)
{
    // Home Route //
    $router->get('/', [App\Controllers\HomeController::class, 'index']);

    // Shop Route //
    $router->get('/shop', [App\Controllers\ShopController::class, 'index']);

    // Product Detail Route // 
    $router->get('/product', [App\Controllers\ProductController::class, 'index']);
    $router->post('/product', [App\Controllers\ProductController::class,'getDetailProduct']);
    $router->post('/product/search', [App\Controllers\ProductController::class,'search']);
    $router->post('/product/sort', [App\Controllers\ProductController::class,'sort']);
    $router->post('/product/category',[App\Controllers\ProductController::class,'category']);

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
    $router->post('/resetpassword', [App\Controllers\ResetPasswordController::class, 'resetpassword']);
    $router->post('/resetpassword/update', [App\Controllers\ResetPasswordController::class, 'updatepassword']);
    // Account Routes //
    $router->get('/account', [App\Controllers\UserController::class, 'index']);
    $router->post('/account', [App\Controllers\UserController::class,'ActionsOrder']);
    // Cart Routes //
    $router->get('/cart', [App\Controllers\CartController::class, 'index']);
    $router->post('/cart', [App\Controllers\CartController::class, 'CRUD_Cart']);
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
    $router->get('/order/search',[App\Controllers\OrderController::class,'searchOrder']);

    // Admin Routes //
    $router->get('/admin',[App\Controllers\AdminController::class,'index']);
    $router->get('/admin/stocks',[App\Controllers\AdminController::class,'getStocks']);
    $router->get('/admin/home',[App\Controllers\AdminController::class,'getHome']);
    $router->post('/admin/home',[App\Controllers\AdminController::class,'updateHome']);
    $router->get('/admin/category',[App\Controllers\AdminController::class,'getCategory']);
    $router->post('/admin/products', [App\Controllers\AdminController::class,'getProducts']);
    $router->post('/admin/product',[App\Controllers\AdminController::class,'CRUD_Products']);
    $router->post('/admin/orders',[App\Controllers\AdminController::class,'getOrders']);
    $router->post('/admin/order',[App\Controllers\AdminController::class,'CRUD_Orders']);
    $router->post('/admin/order/detail',[App\Controllers\AdminController::class,'getDetailOrder']);
    $router->post('/admin/order/search',[App\Controllers\AdminController::class,'searchOrder']);
    $router->post('/admin/order/filter',[App\Controllers\AdminController::class,'getOrderFilter']);
    $router->post('/admin/users',[App\Controllers\AdminController::class,'getUsers']);
    $router->post('/admin/users/search',[App\Controllers\AdminController::class,'searchCustomer']);
    $router->post('/admin/users/sort',[App\Controllers\AdminController::class,'sortCustomer']);
    $router->post('/admin/users/filter',[App\Controllers\AdminController::class,'filterCustomer']);
    $router->post('/admin/users/detail',[App\Controllers\AdminController::class,'getCustomerDetail']);
    $router->post('/admin/users/status',[App\Controllers\AdminController::class,'ManageSatusAccount']);
    $router->post('/admin/users/sendmail',[App\Controllers\AdminController::class,'sendMail']);

    // Paypal //
    $router->post('/paypal-verify',[App\Controllers\Paypal::class,'paypal_verify']);

    // Verify Emial //
    $router->get('/verifyEmail',[App\Controllers\VerifyEmailController::class,'Verify']);

    // Chat box //
    $router->post('/chatbox',[App\Controllers\ChatboxController::class,'AI']);

    // Feedback //
    $router->post('/feedback',[App\Controllers\FeedbackController::class,'addFeedback']);

    // voucher //
    $router->post('/voucher',[App\Controllers\VoucherController::class,'getVoucherByCode']);
}
