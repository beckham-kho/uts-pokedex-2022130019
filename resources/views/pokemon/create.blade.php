@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-black fw-bolder text-left">Add Pokemon</h1>

        @if ($errors->any())
            <div class="alert alert-danger m-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" required type="text" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3 col-3">
                    <label for="species" class="form-label">Species</label>
                    <input name="species" required type="text" class="form-control" id="species" aria-describedby="species">
                </div>
                <div class="mb-3 col-3">
                    <label for="primary_type" class="form-label">Primary Type</label>
                    <select name="primary_type" required class="form-select" id="primary_type" aria-label="primary_type">
                        <option selected>-- Select Primary Type --</option>
                        <option value="Grass">Grass</option>
                        <option value="Fire">Fire</option>
                        <option value="Water">Water</option>
                        <option value="Bug">Bug</option>
                        <option value="Normal">Normal</option>
                        <option value="Poison">Poison</option>
                        <option value="Electric">Electric</option>
                        <option value="Ground">Ground</option>
                        <option value="Fairy">Fairy</option>
                        <option value="Fighting">Fighting</option>
                        <option value="Psychic">Psychic</option>
                        <option value="Rock">Rock</option>
                        <option value="Ghost">Ghost</option>
                        <option value="Ice">Ice</option>
                        <option value="Dragon">Dragon</option>
                        <option value="Dark">Dark</option>
                        <option value="Steel">Steel</option>
                        <option value="Flying">Flying</option>
                    </select>
                </div>
            </div>
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input name="weight" type="number" class="form-control" id="weight" aria-describedby="weight" placeholder="0">
                </div>
                <div class="mb-3 col-3">
                    <label for="height" class="form-label">Height</label>
                    <input name="height" type="number" class="form-control" id="height" aria-describedby="height" placeholder="0">
                </div>
                <div class="mb-3 col-3">
                    <label for="hp" class="form-label">HP</label>
                    <input name="hp" type="number" class="form-control" id="hp" aria-describedby="hp" placeholder="0">
                </div>
            </div>
            <div class="row g-3">
                <div class="mb-3 col-3">
                    <label for="attack" class="form-label">Attack</label>
                    <input name="attack" type="number" class="form-control" id="attack" aria-describedby="attack" placeholder="0">
                </div>
                <div class="mb-3 col-3">
                    <label for="defense" class="form-label">Defense</label>
                    <input name="defense" type="number" class="form-control" id="defense" aria-describedby="defense" placeholder="0">
                </div>
            </div>
                <div class="form-check mb-3">
                    <input name="is_legendary" class="form-check-input" type="checkbox" value="1" id="is_legendary">
                    <label class="form-check-label" for="is_legendary">Is Legendary?</label>
                </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="photo" class="form-label">Pokemon Photo</label>
                    <input name="photo" type="file" @error('photo') is-invalid @enderror accept="image/*" class="form-control" id="photo">
                </div>
                <div class="mb-3 col-3">
                    @error('product_image')
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
