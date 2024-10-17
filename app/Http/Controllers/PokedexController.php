<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class PokedexController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::paginate(9);
        return view('pokedex', compact('pokemons'));
    }

    //fitur search
    public function search(Request $request) {
        $search = $request->search;
        $pokemons = DB::table('pokemon')->where('name', 'like', "%".$search."%")->paginate(9);

        return view('pokedex', compact('pokemons'));
    }
}
