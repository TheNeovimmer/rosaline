<?php
use App\Core\Router;
use App\Core\Session;

/** @var Router $router */

$router->group(['App\Middleware\CsrfMiddleware'], function (Router $router) {

$router->get('/', ['App\Controllers\HomeController', 'index']);
$router->get('/shop', ['App\Controllers\ShopController', 'index']);
$router->get('/shop/category/{slug}', ['App\Controllers\ShopController', 'category']);
$router->get('/product/{slug}', ['App\Controllers\ProductController', 'show']);
$router->post('/product/{slug}/review', ['App\Controllers\ProductController', 'addReview']);

$router->get('/cart', ['App\Controllers\CartController', 'index']);
$router->post('/cart/add', ['App\Controllers\CartController', 'add']);
$router->post('/cart/update', ['App\Controllers\CartController', 'update']);
$router->post('/cart/remove', ['App\Controllers\CartController', 'remove']);

$router->get('/checkout', ['App\Controllers\CheckoutController', 'index']);
$router->post('/checkout/place', ['App\Controllers\CheckoutController', 'place']);

$router->get('/login', ['App\Controllers\AuthController', 'loginForm']);
$router->post('/login', ['App\Controllers\AuthController', 'login']);
$router->get('/register', ['App\Controllers\AuthController', 'registerForm']);
$router->post('/register', ['App\Controllers\AuthController', 'register']);
$router->get('/logout', ['App\Controllers\AuthController', 'logout']);
$router->get('/forgot-password', ['App\Controllers\AuthController', 'forgotPasswordForm']);
$router->post('/forgot-password', ['App\Controllers\AuthController', 'forgotPassword']);
$router->get('/reset-password', ['App\Controllers\AuthController', 'resetPasswordForm']);
$router->post('/reset-password', ['App\Controllers\AuthController', 'resetPassword']);

$router->group(['App\Middleware\AuthMiddleware'], function (Router $router) {
    $router->get('/account', ['App\Controllers\AccountController', 'index']);
    $router->get('/account/orders', ['App\Controllers\AccountController', 'orders']);
    $router->get('/account/orders/{id}', ['App\Controllers\AccountController', 'orderDetail']);
    $router->get('/account/settings', ['App\Controllers\AccountController', 'settings']);
    $router->post('/account/settings', ['App\Controllers\AccountController', 'updateSettings']);
    $router->get('/account/addresses', ['App\Controllers\AccountController', 'addresses']);
    $router->post('/account/addresses/create', ['App\Controllers\AccountController', 'createAddress']);
    $router->post('/account/addresses/{id}/edit', ['App\Controllers\AccountController', 'updateAddress']);
    $router->post('/account/addresses/{id}/delete', ['App\Controllers\AccountController', 'deleteAddress']);
    $router->post('/account/addresses/{id}/default', ['App\Controllers\AccountController', 'setDefaultAddress']);
    $router->get('/account/payment', ['App\Controllers\AccountController', 'payment']);
    $router->post('/account/orders/{id}/cancel', ['App\Controllers\AccountController', 'cancelOrder']);
    $router->post('/account/orders/{id}/return', ['App\Controllers\AccountController', 'requestReturn']);
    $router->get('/account/orders/{id}/invoice', ['App\Controllers\AccountController', 'invoice']);

    $router->get('/wishlist', ['App\Controllers\AccountController', 'wishlist']);
    $router->post('/wishlist/add', ['App\Controllers\AccountController', 'addToWishlist']);
    $router->post('/wishlist/remove', ['App\Controllers\AccountController', 'removeFromWishlist']);
});

$router->get('/blog', ['App\Controllers\BlogController', 'index']);
$router->get('/blog/{slug}', ['App\Controllers\BlogController', 'show']);

$router->get('/about', ['App\Controllers\PageController', 'about']);
$router->get('/contact', ['App\Controllers\PageController', 'contact']);
$router->post('/contact', ['App\Controllers\PageController', 'sendContact']);
$router->get('/faqs', ['App\Controllers\PageController', 'faqs']);
$router->get('/privacy-policy', ['App\Controllers\PageController', 'privacyPolicy']);
$router->get('/terms-of-service', ['App\Controllers\PageController', 'termsOfService']);

$router->group(['App\Middleware\AdminMiddleware'], function (Router $router) {
    $router->get('/admin', ['App\Controllers\Admin\DashboardController', 'index']);

    $router->get('/admin/products', ['App\Controllers\Admin\ProductController', 'index']);
    $router->get('/admin/products/create', ['App\Controllers\Admin\ProductController', 'create']);
    $router->post('/admin/products/create', ['App\Controllers\Admin\ProductController', 'store']);
    $router->get('/admin/products/export', ['App\Controllers\Admin\ProductController', 'export']);
    $router->get('/admin/products/{id}/edit', ['App\Controllers\Admin\ProductController', 'edit']);
    $router->post('/admin/products/{id}/edit', ['App\Controllers\Admin\ProductController', 'update']);
    $router->post('/admin/products/{id}/delete', ['App\Controllers\Admin\ProductController', 'destroy']);

    $router->get('/admin/categories', ['App\Controllers\Admin\CategoryController', 'index']);
    $router->get('/admin/categories/create', ['App\Controllers\Admin\CategoryController', 'create']);
    $router->post('/admin/categories/create', ['App\Controllers\Admin\CategoryController', 'store']);
    $router->get('/admin/categories/{id}/edit', ['App\Controllers\Admin\CategoryController', 'edit']);
    $router->post('/admin/categories/{id}/edit', ['App\Controllers\Admin\CategoryController', 'update']);
    $router->post('/admin/categories/{id}/delete', ['App\Controllers\Admin\CategoryController', 'destroy']);

    $router->get('/admin/orders', ['App\Controllers\Admin\OrderController', 'index']);
    $router->get('/admin/orders/{id}', ['App\Controllers\Admin\OrderController', 'show']);
    $router->post('/admin/orders/{id}/status', ['App\Controllers\Admin\OrderController', 'updateStatus']);

    $router->get('/admin/return-requests', ['App\Controllers\Admin\ReturnRequestController', 'index']);
    $router->post('/admin/return-requests/{id}/approve', ['App\Controllers\Admin\ReturnRequestController', 'approve']);
    $router->post('/admin/return-requests/{id}/reject', ['App\Controllers\Admin\ReturnRequestController', 'reject']);

    $router->get('/admin/users', ['App\Controllers\Admin\UserController', 'index']);
    $router->get('/admin/users/{id}/edit', ['App\Controllers\Admin\UserController', 'edit']);
    $router->post('/admin/users/{id}/edit', ['App\Controllers\Admin\UserController', 'update']);
    $router->post('/admin/users/{id}/delete', ['App\Controllers\Admin\UserController', 'destroy']);

    $router->get('/admin/blog', ['App\Controllers\Admin\BlogController', 'index']);
    $router->get('/admin/blog/create', ['App\Controllers\Admin\BlogController', 'create']);
    $router->post('/admin/blog/create', ['App\Controllers\Admin\BlogController', 'store']);
    $router->get('/admin/blog/{id}/edit', ['App\Controllers\Admin\BlogController', 'edit']);
    $router->post('/admin/blog/{id}/edit', ['App\Controllers\Admin\BlogController', 'update']);
    $router->post('/admin/blog/{id}/delete', ['App\Controllers\Admin\BlogController', 'destroy']);

    $router->get('/admin/pages', ['App\Controllers\Admin\PageController', 'index']);
    $router->get('/admin/pages/create', ['App\Controllers\Admin\PageController', 'create']);
    $router->post('/admin/pages/create', ['App\Controllers\Admin\PageController', 'store']);
    $router->get('/admin/pages/{id}/edit', ['App\Controllers\Admin\PageController', 'edit']);
    $router->post('/admin/pages/{id}/edit', ['App\Controllers\Admin\PageController', 'update']);
    $router->post('/admin/pages/{id}/delete', ['App\Controllers\Admin\PageController', 'destroy']);

    $router->get('/admin/contacts', ['App\Controllers\Admin\ContactController', 'index']);
    $router->get('/admin/contacts/{id}', ['App\Controllers\Admin\ContactController', 'show']);
    $router->post('/admin/contacts/{id}/delete', ['App\Controllers\Admin\ContactController', 'destroy']);

    $router->get('/admin/reviews', ['App\Controllers\Admin\ReviewController', 'index']);
    $router->post('/admin/reviews/{id}/approve', ['App\Controllers\Admin\ReviewController', 'approve']);
    $router->post('/admin/reviews/{id}/reject', ['App\Controllers\Admin\ReviewController', 'reject']);
    $router->post('/admin/reviews/{id}/delete', ['App\Controllers\Admin\ReviewController', 'destroy']);

    $router->get('/admin/reports', ['App\Controllers\Admin\ReportController', 'index']);
    $router->get('/admin/reports/export/sales', ['App\Controllers\Admin\ReportController', 'exportSales']);
    $router->get('/admin/reports/export/products', ['App\Controllers\Admin\ReportController', 'exportProducts']);

    $router->get('/admin/settings', ['App\Controllers\Admin\SettingController', 'index']);
    $router->post('/admin/settings', ['App\Controllers\Admin\SettingController', 'update']);

    $router->get('/admin/activity', ['App\Controllers\Admin\ActivityController', 'index']);

    $router->get('/admin/governorates', ['App\Controllers\Admin\GovernorateController', 'index']);
    $router->get('/admin/governorates/create', ['App\Controllers\Admin\GovernorateController', 'create']);
    $router->post('/admin/governorates/create', ['App\Controllers\Admin\GovernorateController', 'store']);
    $router->get('/admin/governorates/{id}/edit', ['App\Controllers\Admin\GovernorateController', 'edit']);
    $router->post('/admin/governorates/{id}/edit', ['App\Controllers\Admin\GovernorateController', 'update']);
    $router->post('/admin/governorates/{id}/delete', ['App\Controllers\Admin\GovernorateController', 'destroy']);
});

});
