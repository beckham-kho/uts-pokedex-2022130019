<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PokedexController::class, 'index']);

Route::resource('pokemon', PokemonController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\PokemonController::class, 'index'])->name('home');
