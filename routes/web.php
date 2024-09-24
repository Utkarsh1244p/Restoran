<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');

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


//Booking routes
Route::post('/booking', [BookingController::class, 'BookingTable'])->name('booking.store');

//Menu routes
Route::get('/menu', [MenuController::class, 'index'])->name('menu.view');

//My Booking routes
Route::get('/user-booking', [UserController::class, 'getBookings'])->name('user.booking');
Route::get('/user-order', [UserController::class, 'getOrders'])->name('user.order');
