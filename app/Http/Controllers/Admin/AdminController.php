<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Food;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{

    //Login Related Routes
    public function viewLogin(){
        return view('admin.login');
    }

    public function checkLogin(Request $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // Log out the admin
        return redirect()->route('admin.login'); // Redirect to admin login page after logout
    }


    public function viewDashboard(){
        $num_foods = Food::all()->count();
        $num_orders = Cart::all()->count();
        $num_bookings = Booking::all()->count();
        $num_admins = Admin::all()->count();

        if(Auth::guard('admin')->check()) {
            return view('admin.dashboard', compact('num_orders', 'num_bookings', 'num_admins', 'num_foods'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }


    //Admins Related Routes
    public function viewAdmins(){
        $admins = Admin::select()->orderBy('id', 'asc')->get();;

        if(Auth::guard('admin')->check()) {
            return view('admin.admins', compact('admins'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function createAdmin(){
        return view('admin.create-admin');
    }

    public function storeAdmin(Request $request){
        // dd($request->all());
        $admin = new Admin();
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = Hash::make($request['password']);
        $admin->save();

        return redirect()->route('admin.all.admins')->with('success', 'New Admin Created, Successfully');

    }



    //Orders Related Routes
   
    public function viewOrders(){
        $orders = Checkout::select()->orderBy('id','asc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function editOrder($id){
        $order = Checkout::find($id);
        return view('admin.edit-order', compact('order'));
    }

    public function updateOrder(Request $request, $id){
        $order = Checkout::find($id);
        $order->status = $request['status'];
        $order->save();

        return redirect()->route('admin.all.orders')->with('success', 'Order Updated, Successfully');
    }

    public function deleteOrder($id){
        $order = Checkout::find($id);
        $order->delete();

        return redirect()->route('admin.all.orders')->with('success', 'Order Deleted, Successfully');
    }






    //Foods Related Routes

    public function viewFoods(){
        $foods = Food::select()->orderBy('id','asc')->get();
        return view('admin.foods', compact('foods'));
    }

    public function createFood(){
        return view('admin.create-food');
    }

    public function storeFood(Request $request){
        // dd($request->all());

        $destinationPath = 'assets/img';
        $myImage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myImage);

        // $food = Food::create([
        //     'name' => $request['name'],
        //     'image' => $myImage,
        //     'description' => $request['description'],
        //     'price' => $request['price'],
        //     'category' => $request['category'],
        // ]);

        $food = new Food();
        $food->name = $request['name'];
        $food->image = $myImage;
        $food->description = $request['description'];
        $food->price = $request['price'];
        $food->category = $request['category'];
        $food->save();

        return redirect()->route('admin.all.foods')->with('success', 'New Food Created, Successfully');
    }

    public function deleteFood($id){
        $food = Food::find($id);
        $food->delete();

        return redirect()->route('admin.all.foods')->with('success', 'Food Deleted, Successfully');
    }





    //Bookings Related Routes

    public function viewBookings(){
        $bookings = Booking::select()->orderBy('id','asc')->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function editBooking($id){
        $booking = Booking::find($id);
        return view('admin.edit-booking', compact('booking'));
    }

    public function updateBooking(Request $request, $id){
        $booking = Booking::find($id);
        $booking->status = $request['status'];
        $booking->save();

        return redirect()->route('admin.all.bookings')->with('success', 'Booking Updated, Successfully');
    }

    public function deleteBooking($id){
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('admin.all.bookings')->with('success', 'Booking Deleted, Successfully');
    }
}