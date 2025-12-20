<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\FuelType;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('price', '>', 20000)->get();

        $maker = Maker::where('name', 'Toyota')->first();
        $fuelType = new FuelType();
        $fuelType->fill(['name' => 'Electric']);
        $fuelType->save();
        // Or:
        // FuelType::create(['name' => 'Electric']);

        Car::find(1)->update(['price' => 20000]);

        Car::where('year', '<', 2020)->delete();

        return view('home.index');
    }
}
