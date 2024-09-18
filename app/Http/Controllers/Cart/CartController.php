<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    
    public function checkout(){
        return view('cart.checkout');
    }
    // public function checkout($price){
    //     dd($price);
    //     return view('cart.checkout');
    // }

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

    public function prepareCheckout(Request $request){
        // dd($request->all());
        $value = $request->price;
        // dd($value);
        Session::put('price', $value);

        $newPrice = Session::get('price');

        if($newPrice > 0){
            return redirect()->route('checkout');
        }
    }

}
