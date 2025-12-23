<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $maker = Maker::factory()->count(10)->create();
        dd($maker);

        User::factory()->count(10)->create([
            'name' => 'Zura'
        ]);
        return view('home.index');
    }
}
