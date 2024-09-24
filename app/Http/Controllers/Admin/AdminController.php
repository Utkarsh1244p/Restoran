<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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
        if(Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout(); // Log out the admin
        return redirect()->route('admin.login'); // Redirect to admin login page after logout
    }
}
