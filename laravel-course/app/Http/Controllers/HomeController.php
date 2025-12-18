<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        // Select all cars
        $cars = Car::all();
        // Select published cards
        $cars = Car::where('published_at', '!=', null)->get();

        // Select the first car
//        $car = Car::where('published_at', '!=', null)->first();
//        dd($car);

//        $car = Car::find(2);
        $car = Car::orderBy('created_at', 'desc')->get();
        dd($car);
        return view('home.index');
    }
}
