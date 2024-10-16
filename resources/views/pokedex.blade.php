@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-black fw-bolder text-center">Pokemon List</h1>
        <div class="container mt-4">
            <div class="row g-0 gy-4">
                @forelse ($pokemons as $pokemon)
                <div class="col-4">
                    <div class="card shadow-lg mx-auto" style="width: 15.5rem;">
                        <a class="mx-auto" href="{{ route('pokemon.show', $pokemon) }}">
                            <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" width="200" class="img-fluid pt-3" alt="{{ $pokemon->name }}">
                        </a>
                        <div class="card-body">
                            <p class="card-subtitle">{{ Str::padLeft($pokemon->id, 5, '#000') }}</p>
                            <a class="text-decoration-none" href="{{ route('pokemon.show', $pokemon) }}">
                                <h5 class="card-subtitle fw-bold fs-4">{{ $pokemon->name }}</h5>
                            </a>
                            <span class="badge rounded-pill text-bg-success">{{ $pokemon->primary_type }}</span>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="container text-center border rounded mt-4">
                        <h1>Pokemon not found</h1>
                        <p>Add some Pokemon <a href="{{ route('pokemon.create') }}" class="text-decoration-none">here</a></p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {!! $pokemons->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
