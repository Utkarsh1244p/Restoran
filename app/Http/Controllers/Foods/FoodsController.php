<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;
use Session;

class FoodsController extends Controller
{

    public function foodDetails($id){

        if(auth()->user()){
            $foodItem = Food::find($id);
            $cartVerifying = Cart::where('user_id', auth()->user()->id)->where('food_id', $id)->count();

            return view('foods.food-details', compact('foodItem', 'cartVerifying'));
        }
        else{
            $foodItem = Food::find($id);

            return view('foods.food-details', compact('foodItem'));
        
        }

    }

    public function addToCart(Request $request, $id){
        // dd($request->all());

        $cart = new Cart();
        $cart->user_id = $request['user_id'];
        $cart->food_id = $request['food_id'];
        $cart->name = $request['name'];
        $cart->price = $request['price'];
        $cart->image = $request['image'];
        $cart->save();

        // dd($foodItem->image);
        return redirect()->route('food.details', $id)->with('success', 'Item added to the cart successfully!');
    }



}
