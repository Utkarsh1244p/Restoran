<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
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


    public function logout()
    {
        Auth::guard('admin')->logout(); // Log out the admin
        return redirect()->route('admin.login'); // Redirect to admin login page after logout
    }
}
