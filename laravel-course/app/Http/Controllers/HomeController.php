<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
//        // Select all cars
//        $cars = Car::all();
//        // Select published cards
//        $cars = Car::where('published_at', '!=', null)->get();
//        $car = Car::orderBy('created_at', 'desc')->get();
//        dd($car);

        $car = new Car();
        $car->maker_id = 1;
        $car->model_id = 1;
        $car->year = 1;
        $car->price = 1;
        $car->vin = 1;
        $car->car_type_id = 1;
        $car->fuel_type_id = 1;
        $car->user_id = 1;
        $car->city_id = 1;
        $car->address = "lorem  ";
        $car->phone = "123";
        $car->description = null;
        $car->published_at = now();
        $car->created_at = now();
         $car->save();


//        return view('home.index');
    }
}
