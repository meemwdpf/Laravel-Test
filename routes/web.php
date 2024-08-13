<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', [CustomerController::class, 'index'])->name('customer'); 

Route::get('createcustomer', [CustomerController::class, 'create'])->name('customercreate');

Route::post('store', [CustomerController::class, 'store'])->name('store');

Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('edit');

Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('update');

Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('destroy');


