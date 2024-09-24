<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Checkout;
use App\Models\Review;
use Illuminate\Http\Request;
use Session;

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

    public function writeNewReview(){
        return view('user.review');
    }


    public function storeReview(Request $request){
        $review = new Review();
        $review->name = $request['name'];
        $review->review = $request['review'];
        
        $review->save();

        if($review){
            return redirect()->route('user.review.write')->with('success', 'New Review added successfully');
        }

    }
}
