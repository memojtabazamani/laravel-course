<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\FoodController as FoodControllerAlias;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController as ProductC;
use App\Http\Controllers\ShowCarController;
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

//Route::get('/product/{id}', function(string $id) {
//    return "Product id: $id";
//});

//Route::get('/product/{category?}', function(string $category = null) {
//    return "Product category: $category";
//});

Route::get('/product/{id}', function(string $id) {
    return "Works! $id";
})->whereNumber('id');

Route::get('/user/{username}', function(string $username) {

})->where('username', '[a-z]+');

Route::get('{lang}/product/{id}', function($lang, $id) {

})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}']);

Route::get('/search/{search}', function($search) {

})->where('search', '.*');

Route::get('/{lang}/product/{id}', function($lang, $id) {
    // ...
})->name('product.detail');

Route::get('/user/profile', function (){

})->name('profile');

Route::get('/current-user', function (){
    return redirect()->route('profile');

    return to_route('profile');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function (){

    });
});

Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        return '/users';
    })->name('users');
});

Route::fallback(function () {
    return 'Fallback';
});

//Route::get('/sum/{a}/{b}', function (float $a, float $b) {
//    return $a + $b;
//})->whereNumber(['a', 'b']);

//Route::get('/car', [CarController::class, 'index']);

//Route::controller(CarController::class)->prefix('car')->group(function () {
//    Route::get('/car','index');
//    Route::get('/my-cars','myCars');
//});
//
//Route::get('/car/invokable', CarController::class);
//Route::get('/car', [CarController::class, 'index']);

//Route::resource('/products', ProductC::class);
// Route::apiResources('/products', ProductControllerAlias::class);

//Route::apiResources('cars', FoodControllerAlias::class);
//Route::apiResources([
//    'food'      => FoodControllerAlias::class ,
//    'products'  => ProductController::class ,
//]);

//Route::get('sum/{a}/{b}', [MathController::class, 'sum'])->whereNumber(['a', 'b']);
//Route::get('subtract/{a}/{b}', [MathController::class, 'subtract'])->whereNumber(['a', 'b']);

