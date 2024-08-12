<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController; // Import the controller

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', [CustomerController::class, 'index']); // Use the controller method
