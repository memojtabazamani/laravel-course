<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HelloController extends Controller
{
    public function welcome()
    {
        return View::make('hello.welcome',
        [
            'name' => 'John',
            'surname' => 'Doe'
        ]);
    }
}
