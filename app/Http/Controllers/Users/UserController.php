<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Checkout;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getBookings(){
        $bookings = Booking::where('user_id', 1)->get();
        // dd($bookings);
        return view('user.booking', compact('bookings'));
    }
    public function getOrders(){
        $orders = Checkout::where('user_id', 1)->get();
        return view('user.order', compact('orders'));
    }
}
