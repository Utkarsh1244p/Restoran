<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $breakfastFood = Food::where('category', 'Breakfast')->take(4)->orderBy('id', 'desc')->get();
        $dinnerFood = Food::where('category', 'Dinner')->take(4)->orderBy('id', 'desc')->get();
        $lunchFood = Food::where('category', 'Lunch')->take(4)->orderBy('id', 'desc')->get();
        return view('home',compact('breakfastFood','lunchFood', 'dinnerFood'));
    }
}
