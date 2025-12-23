<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\CarModel ;
use App\Models\User;
use Database\Factories\MakerFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $maker = Maker::factory()->create();
        CarModel::factory()
            ->count(5)
            ->for($maker);

        return view('home.index');
    }
}
