<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $breakfastFood = Food::where('category', 'Breakfast')->take(4)->orderBy('id', 'desc')->get();
        $dinnerFood = Food::where('category', 'Dinner')->take(4)->orderBy('id', 'desc')->get();
        $lunchFood = Food::where('category', 'Lunch')->take(4)->orderBy('id', 'desc')->get();
        return view('menu.menu',compact('breakfastFood','lunchFood', 'dinnerFood'));
    }
}
