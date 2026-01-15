<?php

use App\Http\Controllers\SamuraiController;
use App\Http\Controllers\SwordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

// Kontroller direkt meghívás
/* Route::get('/swords', [SwordController::class, "index"])->name("swords.index"); */

//RESOURCE útvonalak
Route::get('/swords/trashedSwords', [SwordController::class, "showTrashed"])->name("swords.trashed");
Route::post('/swords/{sword}/restore', [SwordController::class, "restore"])->withTrashed()->name("swords.restore");
//Mivel a restore funkció vár egy kard paramétert, de softDeleted (TÖRÖLT) kardot akarunk átadni, ezért az útvonalnál a withTrashed() funkcióval engedélyezni kell a törölt kard paraméterként való átadását
Route::resource('/swords', SwordController::class);

Route::resource('/samurais', SamuraiController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //A felhasználó saját DASHBOARD-ja (Landing Page)
