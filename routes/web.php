<?php

use App\Http\Controllers\SwordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/swords', [SwordController::class, "index"])->name("swords.index");