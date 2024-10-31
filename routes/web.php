<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function(){
    
// })->name('home');

// Route::get('/shop', function(){
//     return 'Page shop';
// })->middleware('checkAge');

// Route::get('/about', function(){
//     return 'Page about';
// });

// Route::get('/contact', function(){
//     return 'Page contact';
// });

// Route::post('/post', function(){
//     echo 'Method post';
// });

// Route::put('/put', function(){
//     echo 'Method put';
// });

Route::prefix('admin')->group(function(){

    Route::get('posts/{posts}/comments/{comments}', function($postId, $commentId){
        return "postId: $postId - commentId: $commentId";
    });
    
    Route::get('user/{name?}', function($name = 'john'){
        return $name;
    });
});


Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);
Route::resource('home', HomeController::class);

Route::get('child', function(){
    return view('/child');
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class, ['name' => 'admin.users']);
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('home.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/categories/{category_id}', [CategoryShowController::class, 'index'])->name('home.category');
Route::get('/products/search', 'ProductController@search')->name('products.search');
// routes/web.php
Route::get('/category', [HomeController::class, 'index'])->name('category');



