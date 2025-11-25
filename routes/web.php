<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ZooController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Test4Oihan', [AnimalController::class, 'index']);

Route::resource('/animals', AnimalController::class);

Route::resource('/zoos', ZooController::class);