<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserControl;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredUserControllerController;
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
use App\Controllers\Admin;
use App\Http\Controllers\CategoryShowController;

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

Route::get('child', function () {
    return view('/child');
});

//home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('home.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

//blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

//categories
Route::get('/categories', [CategoryShowController::class, 'index']);
Route::get('/categories/{id}/products', [ProductController::class, 'getProductsByCategory'])->name('categories.products');


//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('home.checkout');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

// addToCart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/item_count', 'CartController@getItemCount')->name('cart.item_count');

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

    Route::get('/forgot-password', [AuthenticatedSessionController::class, '/forgot_password'])->name('forgot_password');
    Route::post('/forgot-password', [AuthenticatedSessionController::class, 'check_forgot_password']);

    Route::get('/reset-password', [AuthenticatedSessionController::class, '/reset_password'])->name('reset_password');
    Route::post('/reset-password', [AuthenticatedSessionController::class, 'check_reset_password']);
});



//admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('home', App\Http\Controllers\Admin\HomeController::class, ['names' => 'Admin.home']);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' => 'Admin.users']);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class, ['names' => 'Admin.products']);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class, ['names' => 'Admin.orders']);
    Route::resource('orderItems', App\Http\Controllers\Admin\OrderItemController::class, ['names' => 'Admin.orderItems']);
    Route::resource('categories', App\Http\Controllers\admin\CategoryController::class, ['names' => 'Admin.categories']);
});
