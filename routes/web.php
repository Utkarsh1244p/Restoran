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

//admins
Route::get('admin/admins', [AdminController::class, 'viewAdmins'])->name('admin.all.admins');
Route::get('admin/admin-create', [AdminController::class, 'createAdmin'])->name('admin.create.admin');
Route::post('admin/admin-store', [AdminController::class, 'storeAdmin'])->name('admin.store.admin');
Route::get('admin/admin-delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admin');


//orders
Route::get('admin/orders', [AdminController::class, 'viewOrders'])->name('admin.all.orders');
Route::get('admin/order-edit/{id}', [AdminController::class, 'editOrder'])->name('admin.edit.order');
Route::post('admin/order-edit/{id}', [AdminController::class, 'updateOrder'])->name('admin.update.order');
Route::get('admin/order-delete/{id}', [AdminController::class, 'deleteOrder'])->name('admin.delete.order');

//foods
Route::get('admin/foods', [AdminController::class, 'viewFoods'])->name('admin.all.foods');
Route::get('admin/food-create', [AdminController::class, 'createFood'])->name('admin.create.food');
Route::post('admin/food-store', [AdminController::class, 'storeFood'])->name('admin.store.food');
Route::get('admin/food-delete/{id}', [AdminController::class, 'deleteFood'])->name('admin.delete.food');

//bookings
Route::get('admin/bookings', [AdminController::class, 'viewBookings'])->name('admin.all.bookings');
Route::get('admin/booking-edit/{id}', [AdminController::class, 'editBooking'])->name('admin.edit.booking');
Route::post('admin/booking-edit/{id}', [AdminController::class, 'updateBooking'])->name('admin.update.booking');
Route::get('admin/booking-delete/{id}', [AdminController::class, 'deleteBooking'])->name('admin.delete.booking');

