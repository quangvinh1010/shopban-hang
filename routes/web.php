<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Example:
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryShowController;
use App\Http\Controllers\Admin\VoucherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);
Route::resource('home', HomeController::class);
Route::resource('posts', PostController::class);






//home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('home.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/products/{user_id}/{product_id}', [ProductController::class, 'addComment'])->name('product.comment');
Route::post('/product/{proId}/comment', [ProductController::class, 'addComment'])->name('product.comment');



//blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.create');



//categories
Route::get('/categories', [CategoryShowController::class, 'index']);
Route::get('/categories/{id}/products', [ProductController::class, 'getProductsByCategory'])->name('categories.products');

//Đơn hàng
Route::resource('orders', OrderController::class);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');  // Listing orders
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');  // Viewing a single order
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');  // Edit order
Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');  // Update order




//checkout
Route::group(['prefix' => 'order', 'middleware' => 'customer'], function () {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout', [CheckoutController::class, 'post_checkout']);

    Route::get('/order/verify/{token}', [CheckoutController::class, 'verify'])->name('order.verify');
});

// Cart 
Route::prefix('cart')->middleware('customer')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/delete/{product_id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::put('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/apply-voucher', [CartController::class, 'applyVoucher'])->name('apply.voucher');

});

//Route login
Route::group(['prefix' => 'Auth'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'check_login']);
    Route::get('/verify-account/{email}', [RegisteredUserController::class, 'verify_account'])->name('auth.verify_account');
    Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisteredUserController::class, 'register'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'check_register']);

    Route::group(['middleware' => 'customer'], function () {
        Route::get('/profile', [AuthenticatedSessionController::class, 'profile'])->name('profile');
        Route::post('/profile', [AuthenticatedSessionController::class, 'check_profile']);
        Route::post('/profile/update', [AuthenticatedSessionController::class, 'check_profile'])->name('profile.update');


        Route::get('/change-password', [AuthenticatedSessionController::class, 'change_password'])->name('change_password');
        Route::post('/check-change-password', [AuthenticatedSessionController::class, 'check_change_password'])->name('check-change-password');
    });

    Route::name('auth.')->group(function () {
        Route::get('/forgot-password', [AuthenticatedSessionController::class, 'forgot_password'])->name('forgot_password');
        Route::post('/forgot-password', [AuthenticatedSessionController::class, 'check_forgot_password']);
    });

    Route::get('/reset-password/{token}', [AuthenticatedSessionController::class, 'reset_password'])->name('auth.reset_password');
    Route::post('/reset-password/{token}', [AuthenticatedSessionController::class, 'check_reset_password']);
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

//voucher
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('vouchers', VoucherController::class);
    Route::post('apply-voucher', [VoucherController::class, 'applyVoucher'])->name('applyVoucher');
});





// admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::put('admin/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::get('products/image/{image}', [App\Http\Controllers\Admin\ProductController::class, 'destroyImage'])->name('product.destroyImage');

    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::patch('/orders/{id}/approve', [App\Http\Controllers\Admin\OrderController::class, 'approve'])->name('orders.approve');
    Route::patch('/orders/{id}/update-status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::post('orders/{orderId}/status', [App\Http\Controllers\Admin\OrderController::class, 'changeStatus'])->name('orders.changeStatus');


    Route::resource('orderItems', App\Http\Controllers\Admin\OrderItemController::class);
    Route::get('admin/orderItems/{id}/edit', [App\Http\Controllers\Admin\OrderItemController::class, 'edit'])->name('admin.orderItems.edit');
    Route::put('admin/orderItems/{id}', [App\Http\Controllers\Admin\OrderItemController::class, 'update'])->name('admin.orderItems.update');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('admin/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/user/{id}/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::post('admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');



});
