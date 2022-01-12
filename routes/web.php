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


// ALL USER ACCESS
Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'showHome'])->name('home.list');
Route::get('/category/{categoryId}', [HomeController::class, 'showProductCategory'])->name('category');
Route::get('/aboutus', [HomeController::class, 'showCategoryAboutus'])->name('aboutus');

// GUEST ONLY
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    // LOGGED IN ONLY
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/profile', [HomeController::class, 'showCategoryProfile'])->name('profile');

    Route::get('/category/{category_id}', [HomeController::class , 'showProductCategory']);
    Route::get('/product/details/{productId}', [ProductDetailController::class, 'getProductDetails'])->name('productDetail');


    // CUSTOMER SECTION HERE
    Route::middleware('customer')->group(function () {
        Route::get('/cart', [HomeController::class, 'cartList'])->name('cart.list');
        Route::post('/cart', [HomeController::class, 'addToCart'])->name('cart.store');
        Route::post('/update-cart', [HomeController::class, 'updateCart'])->name('cart.update');
        Route::post('/remove', [HomeController::class, 'removeCart'])->name('cart.remove');
        Route::post('/clear', [HomeController::class, 'clearAllCart'])->name('cart.clear');

        Route::get('/transaction/{product_id}', [HomeController::class, 'showTransaction']);
        Route::get('/transaction-history', [HomeController::class, 'showCategorytransactionHistory'])->name('transaction-history');

        Route::get('/shoppingcart', [HomeController::class, 'showCategoryShoppingCart'])->name('shoppingcart');
        Route::get('/wishlist', [HomeController::class, 'showCategoryWishlist'])->name('wishlist');
        Route::get('/checkout', [HomeController::class, 'showCategoryCheckout'])->name('checkout');
    });


    // ADMIN SECTION HERE
    Route::middleware('admin')->group(function() {
        Route::get('/admin', [HomeController::class, 'showCategoryAdmin'])->name('admin');
        Route::get('/add-product', [HomeController::class, 'showCategoryAdd'])->name('addProduct');
        Route::get('/delete-product', [HomeController::class, 'showCategoryDelete'])->name('deleteProduct');
    });
});

Route::get('update-product', function(){
    return view('updateProduct');
})->name('updateProduct');
