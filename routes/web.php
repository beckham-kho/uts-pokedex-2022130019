<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;

Route::get('/', [PokedexController::class, 'index']);

//fitur search pokedex
Route::get('search', [PokedexController::class, 'search']);

//fitur search pokemon
Route::get('pokemon/search', [PokemonController::class, 'search']);

Route::resource('pokemon', PokemonController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\PokemonController::class, 'index'])->name('home');
