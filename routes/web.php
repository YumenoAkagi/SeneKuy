<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::redirect('/', '/home');

// Route::get('/home', [HomeController::class , 'showHome'])->name('home.list');
Route::get('/home', [HomeController::class, 'showProduct'])->name('home');

Route::get('/category/{category_id}', [UserController::class , 'showProductCategory']);

Route::get('/transaction/{product_id}', [UserController::class, 'showTransaction']);

Route::get('/cart', [UserController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [UserController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [UserController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [UserController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [UserController::class, 'clearAllCart'])->name('cart.clear');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/product/details/{productId}', [ProductDetailController::class, 'getProductDetails'])->name('productDetail');

Route::get('/aboutus', function(){
    return view('aboutUs');
})->name('aboutus');

Route::get('/shoppingcart', function(){
    return view('shoppingCart');
})->name('shoppingcart');

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

Route::get('/category', function(){
    return view('category');
})->name('category');

Route::get('/transaction-history', function(){
    return view('historyTransaction');
})->name('transaction-history');

Route::get('/checkout', function(){
    return view('checkout');
})->name('checkout');

Route::get('/wishlist', function(){
    return view('wishlist');
})->name('wishlist');

Route::get('/admin', function(){
    return view('admin');
})->name('admin');

Route::get('/add-product', function(){
    return view('addProduct');
})->name('addProduct');
