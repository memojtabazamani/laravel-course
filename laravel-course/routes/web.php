<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\FoodController as FoodControllerAlias;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController as ProductC;
use App\Http\Controllers\ShowCarController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function() {
//    // $aboutPageUrl = '/about';
//    // $aboutPageUrl = route('about');
//    // dd($aboutPageUrl);
//
//    $productUrl = route('product.detail',
//        ['id' => 1, 'lang' => 'en']);
//    dd($productUrl);
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/hello', [HelloController::class, 'welcome'])->name('hello');
Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');
