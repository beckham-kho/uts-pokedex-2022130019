<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokedexController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::paginate(9);
        return view('pokedex', compact('pokemon'));
    }
}
