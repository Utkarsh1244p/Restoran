<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    
    public function displayCart(){
        if(auth()->user()){
            //To get all items in cart of specific user
            $cartItems = Cart::where('user_id', auth()->user()->id)->get();
            // dd($cartItems);

            //To get total price of all items in cart
            $totalPrice = Cart::where('user_id', auth()->user()->id)->sum('price');
            // dd($totalPrice);

            return view('cart.cart', compact('cartItems', 'totalPrice'));
        }
        else{
            abort(403);
        }
    }


    public function deleteFromCart($id){
        $cartItem = Cart::where('user_id', auth()->user()->id)->where('food_id', $id);
        $cartItem->delete();
        return redirect()->route('cart.display')->with('success', 'Item deleted from the cart successfully!');
    }

    


}
