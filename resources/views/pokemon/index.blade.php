@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-black fw-bolder text-center">Pokemon List</h1>

        <a href="{{ route('pokemon.create') }}" class="btn btn-sm btn-success fs-5">Add Pokemon</a>

        @if(session()->has('success'))
            <div class="alert alert-success mt-4">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="container text-center mt-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Species</th>
                        <th scope="col">Primary Type</th>
                        <th scope="col">Power</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pokemons as $pokemon)
                        <tr>
                            <td>{{Str::padLeft($pokemon->id, 5, '#000')}}</td>
                            <td>{{ $pokemon->name }}</td>
                            <td>{{ $pokemon->species }}</td>
                            <td>{{ $pokemon->primary_type }}</td>
                            <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                            <td>
                                <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-sm btn-warning d-inline">Edit</a>
                                <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete Pokemon {{ $pokemon->name }}')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4">
                                <div class="container text-center border rounded">
                                    <h1>Pokemon not found</h1>
                                    <p>Add some Pokemon <a href="{{ route('pokemon.create') }}" class="text-decoration-none">here</a></p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {!! $pokemons->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
