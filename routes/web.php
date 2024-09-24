<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\CheckForAdminLogin;
use App\Http\Middleware\CheckForAuth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Frontend Pages Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.view');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

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



//User Routes
Route::group(['prefix' => '/user', 'as' => 'user.'], function(){
    
    //My Booking routes
    Route::get('/booking', [UserController::class, 'getBookings'])->name('booking');
    Route::get('/order', [UserController::class, 'getOrders'])->name('order');
    
    //Review routes
    Route::get('/review', [UserController::class, 'writeNewReview'])->name('review.write');
    Route::post('/store-review', [UserController::class, 'storeReview'])->name('review.store');
    
});

Route::get('admin/login', [AdminController::class, 'viewLogin'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'checkLogin'])->name('check.login');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/dashboard', [AdminController::class, 'viewDashboard'])->name('admin.dashboard');
Route::get('admin/admins', [AdminController::class, 'viewAdmins'])->name('admin.all.admins');
Route::get('admin/create-admin', [AdminController::class, 'createAdmin'])->name('admin.create.admin');
Route::post('admin/store-admin', [AdminController::class, 'storeAdmin'])->name('admin.store.admin');
