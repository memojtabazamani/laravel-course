<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
//        $car = Car::find(1);
//        $car->price = 1000;
//        $car->save();
        $car = new Car();
        $car = Car::updateOrCreate([
            'vin' => '5', 'price' => 40000
        ], ['price' => 90000000]);

        return view('home.index');
    }
}
