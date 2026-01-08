<?php

use App\Http\Controllers\SwordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Kontroller direkt meghívás
/* Route::get('/swords', [SwordController::class, "index"])->name("swords.index"); */

//RESOURCE útvonalak
Route::resource('/swords', SwordController::class);

