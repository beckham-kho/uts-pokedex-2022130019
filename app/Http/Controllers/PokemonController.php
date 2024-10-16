<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PokemonController extends Controller
{
    public function __construct()
    {
        //sengaja di except supaya nggak perlu login pas testing
        //JANGAN LUPA HAPUS EXCEPTNYA KALO UDAH BERES (kecuali show)
        $this->middleware('auth')->except('show', 'index', 'create', 'destroy', 'store', 'update', 'edit');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:99999999|',
            'height' => 'numeric|max:99999999',
            'hp' => 'numeric|max:9999',
            'attack' => 'numeric|max:9999',
            'defense' => 'numeric|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $pokemon = Pokemon::create($validated);

        if($request->hasFile('photo')){
            $filePath = $request->file('photo')->store('images');
            $pokemon->update(['photo' => $filePath]);
        }

        return redirect()->route('pokemon.index')->with('success', 'Pokemon added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:99999999|',
            'height' => 'numeric|max:99999999',
            'hp' => 'numeric|max:9999',
            'attack' => 'numeric|max:9999',
            'defense' => 'numeric|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $pokemon->update($validated);

        if($request->hasFile('photo')) {
            if($pokemon->photo) {
                Storage::delete($pokemon->photo);
            }
            $filePath = $request->file('photo')->store('images');
            $pokemon->update(['photo' => $filePath]);
        }
        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if($pokemon->photo) {
            Storage::delete($pokemon->photo);
        }
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully!');
    }
}
