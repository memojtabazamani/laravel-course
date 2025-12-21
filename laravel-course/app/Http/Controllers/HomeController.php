<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $car = Car::find(1);

        // dd($car->carType);

        $carType = CarType::where('name', 'Hatchback')->first();

        $cars = Car::whereBelongsTo($carType)->get();

        dd($carType->cars);

        return view('home.index');
    }
}
