<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Home Page Route
Route::get('/', [HomeController::class, 'index']);

//About Page Route
Route::get('/about', [HomeController::class, 'about'])->name('about');


//Food 
Route::get('/foods/food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
Route::post('/foods/food-details/{id}', [FoodsController::class, 'addToCart'])->name('food.add.cart');

//Cart routes
Route::get('/cart', [CartController::class, 'displayCart'])->name('cart.display');
Route::get('/cart/delete-item/{id}', [CartController::class, 'deleteFromCart'])->name('cart.delete');

//Checkout routes
Route::post('/prepare-checkout', [CheckoutController::class, 'prepareCheckout'])->name('prepare.checkout');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
Route::get('/checkout/pay', [CheckoutController::class, 'payWithPaypal'])->name('pay.paypal');
Route::get('/checkout/done', [CheckoutController::class, 'payWithPayPalSuccess'])->name('pay.success');

