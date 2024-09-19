<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    
    public function checkout(){
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user->id);
        if(Session::get('price') == 0){
            abort('403', 'You Do Not Have Permission To Access This Page');
        }
        else{
            return view('checkout.checkout', compact('user'));
        }
    }
    
    public function payWithPaypal(){
        if(Session::get('price') == 0){
            abort('403', 'You Do Not Have Permission To Access This Page');
        }
        else{
            return view('checkout.pay');
        }
    }



    public function payWithPayPalSuccess(){
        $itemToDelete = Cart::where('user_id', auth()->user()->id)->get();
        foreach($itemToDelete as $item){
            $item->delete();
        }

        if($itemToDelete){
            if(Session::get('price') == 0){
                abort('403', 'You Do Not Have Permission To Access This Page');
            }
            else{
                Session::forget('price');
                return redirect()->route('cart.display')->with('success', 'Payment successful! Thank you for your purchase.');
            }
        }

    }

    public function prepareCheckout(Request $request){
        // dd($request->all());
        $value = $request->price;
        // dd($value);
        Session::put('price', $value);

        $newPrice = Session::get('price');
        // dd($newPrice);

        if($newPrice > 0){
            return redirect()->route('checkout' );
        }
    }

    public function checkoutStore(Request $request){
        $checkout = new Checkout();
        $checkout->user_id = auth()->user()->id;
        $checkout->name = $request['name'];
        $checkout->email = $request['email'];
        $checkout->town = $request['town'];
        $checkout->country = $request['country'];
        $checkout->zipcode = $request['zipcode'];
        $checkout->phone = $request['phone'];
        $checkout->address = $request['address'];
        $checkout->price = $request['price'];
        $checkout->save();

        if($checkout){
            if(Session::get('price') == 0){
                abort('403', 'You Do Not Have Permission To Access This Page');
            }
            else{
                return redirect()->route('pay.paypal');
            }   
        }

    }
}
