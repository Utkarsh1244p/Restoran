<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Home Page Route
Route::get('/', [HomeController::class, 'index']);

//Food 
Route::get('/foods/food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
Route::post('/foods/food-details/{id}', [FoodsController::class, 'addToCart'])->name('food.add.cart');

//Cart routes
Route::get('/cart', [CartController::class, 'displayCart'])->name('cart.display');
Route::get('/cart/delete-item/{id}', [CartController::class, 'deleteFromCart'])->name('cart.delete');
Route::post('/cart/prepare-checkout', [CartController::class, 'prepareCheckout'])->name('prepare.checkout');

//Checkout routes
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'checkoutStore'])->name('checkout.store');
// Route::get('/foods/cart/checkout/{price}', [CartController::class, 'checkout'])->name('cart.checkout');