@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-black fw-bolder text-left">Edit Pokemon - {{ $pokemon->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger m-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" required type="text" class="form-control" id="name" aria-describedby="name" value={{ old('name', $pokemon->name) }}>
                </div>
                <div class="mb-3 col-3">
                    <label for="species" class="form-label">Species</label>
                    <input name="species" required type="text" class="form-control" id="species" aria-describedby="species" value={{ old('name', $pokemon->species) }}>
                </div>
                <div class="mb-3 col-3">
                    <label for="primary_type" class="form-label">Primary Type</label>
                    <select name="primary_type" required class="form-select" id="primary_type" aria-label="primary_type">
                        <option selected>-- Select Primary Type --</option>
                        <option @if($pokemon->primary_type == 'Grass') selected @endif value="Grass">Grass</option>
                        <option @if($pokemon->primary_type == 'Fire') selected @endif value="Fire">Fire</option>
                        <option @if($pokemon->primary_type == 'Water') selected @endif value="Water">Water</option>
                        <option @if($pokemon->primary_type == 'Bug') selected @endif value="Bug">Bug</option>
                        <option @if($pokemon->primary_type == 'Normal') selected @endif value="Normal">Normal</option>
                        <option @if($pokemon->primary_type == 'Poison') selected @endif value="Poison">Poison</option>
                        <option @if($pokemon->primary_type == 'Electric') selected @endif value="Electric">Electric</option>
                        <option @if($pokemon->primary_type == 'Ground') selected @endif value="Ground">Ground</option>
                        <option @if($pokemon->primary_type == 'Fairy') selected @endif value="Fairy">Fairy</option>
                        <option @if($pokemon->primary_type == 'Fighting') selected @endif value="Fighting">Fighting</option>
                        <option @if($pokemon->primary_type == 'Psychic') selected @endif value="Psychic">Psychic</option>
                        <option @if($pokemon->primary_type == 'Rock') selected @endif value="Rock">Rock</option>
                        <option @if($pokemon->primary_type == 'Ghost') selected @endif value="Ghost">Ghost</option>
                        <option @if($pokemon->primary_type == 'Ice') selected @endif value="Ice">Ice</option>
                        <option @if($pokemon->primary_type == 'Dragon') selected @endif value="Dragon">Dragon</option>
                        <option @if($pokemon->primary_type == 'Dark') selected @endif value="Dark">Dark</option>
                        <option @if($pokemon->primary_type == 'Steel') selected @endif value="Steel">Steel</option>
                        <option @if($pokemon->primary_type == 'Flying') selected @endif value="Flying">Flying</option>
                    </select>
                </div>
            </div>
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input name="weight" type="number" class="form-control" id="weight" aria-describedby="weight" placeholder="0" value={{ old('name', $pokemon->weight) }}>
                </div>
                <div class="mb-3 col-3">
                    <label for="height" class="form-label">Height</label>
                    <input name="height" type="number" class="form-control" id="height" aria-describedby="height" placeholder="0" value={{ old('name', $pokemon->height) }}>
                </div>
                <div class="mb-3 col-3">
                    <label for="hp" class="form-label">HP</label>
                    <input name="hp" type="number" class="form-control" id="hp" aria-describedby="hp" placeholder="0" value={{ old('name', $pokemon->hp) }}>
                </div>
            </div>
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="attack" class="form-label">Attack</label>
                    <input name="attack" type="number" class="form-control" id="attack" aria-describedby="attack" placeholder="0" value={{ old('name', $pokemon->attack) }}>
                </div>
                <div class="mb-3 col-3">
                    <label for="defense" class="form-label">Defense</label>
                    <input name="defense" type="number" class="form-control" id="defense" aria-describedby="defense" placeholder="0" value={{ old('name', $pokemon->defense) }}>
                </div>
            </div>
                <div class="form-check mb-3">
                    <input @if($pokemon->is_legendary == 1) checked @endif name="is_legendary" class="form-check-input" type="checkbox" value="1" id="is_legendary">
                    <label class="form-check-label" for="is_legendary">Is Legendary?</label>
                </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="photo" class="form-label">Pokemon Photo</label>
                    <input name="photo" type="file" @error('photo') is-invalid @enderror accept="image/*" class="form-control" id="photo">
                </div>
                <div class="mb-3 col-3">
                    @error('photo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
