@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="d-flex justify-content-between px-5">
            <h1 class="text-black fw-bolder text-center">Pokemon List</h1>
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Pokemon..." name="search">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>

        <div class="container mt-4">
            <div class="row g-0 gy-4">
                @forelse ($pokemons as $pokemon)
                <div class="col-4">
                    <div class="card shadow-lg mx-auto" style="width: 15.5rem;">
                        <a class="mx-auto" href="{{ route('pokemon.show', $pokemon->id) }}">
                            <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" width="200" class="img-fluid pt-3" alt="{{ $pokemon->name }}">
                        </a>
                        <div class="card-body">
                            <p class="card-subtitle">{{ Str::padLeft($pokemon->id, 5, '#000') }}</p>
                            <a class="text-decoration-none" href="{{ route('pokemon.show', $pokemon->id) }}">
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
