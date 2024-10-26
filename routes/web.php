<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return 'Page home';
})->name('home');

Route::get('/shop', function(){
    return 'Page shop';
})->middleware('checkAge');

Route::get('/about', function(){
    return 'Page about';
});

Route::get('/contact', function(){
    return 'Page contact';
});

Route::post('/post', function(){
    echo 'Method post';
});

Route::put('/put', function(){
    echo 'Method put';
});

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

Route::get('child', function(){
    return view('/child');
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class, ['name' => 'admin.users']);
});

