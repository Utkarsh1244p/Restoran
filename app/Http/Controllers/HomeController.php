<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $reviews = Review::all();
        $breakfastFood = Food::where('category', 'Breakfast')->take(4)->orderBy('id', 'desc')->get();
        $dinnerFood = Food::where('category', 'Dinner')->take(4)->orderBy('id', 'desc')->get();
        $lunchFood = Food::where('category', 'Lunch')->take(4)->orderBy('id', 'desc')->get();
        return view('home',compact('breakfastFood','lunchFood', 'dinnerFood', 'reviews'));
    }

    public function about()
    {
        return view('about');
    }
    
    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }
}
