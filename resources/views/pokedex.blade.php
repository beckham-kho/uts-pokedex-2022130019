@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-black fw-bolder text-center">Pokemon List</h1>
        <div class="container mt-5">
            <div class="row justify-content-evenly">
                @forelse ($pokemons as $pokemon)
                <div class="card col-4" style="width: 18rem;">
                    <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" class="my-2" alt="{{ $pokemon->name }}">
                    <div class="card-body">
                        <p class="card-subtitle">{{ Str::padLeft($pokemon->id, 5, '#000') }}</p>
                        <h5 class="card-subtitle fw-bold fs-4">{{ $pokemon->name }}</h5>
                        <span class="badge rounded-pill text-bg-success">{{ $pokemon->primary_type }}</span>
                    </div>
                </div>
                @empty
                    <h1>Pokemon not found</h1>
                    <p>Add some Pokemon <a href="{{ route('pokemon.create') }}" class="text-decoration-none">here</a></p>
                @endforelse
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {!! $pokemons->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
