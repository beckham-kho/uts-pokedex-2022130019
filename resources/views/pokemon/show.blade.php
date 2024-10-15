@extends('layouts.app')

@section('content')
    <h1 class="text-black fw-bolder text-center">Pokemon Detail - {{ $pokemon->name }}</h1>

    <div class="container">
        <div class="border border-2 rounded border-black mx-auto my-5" style="--bs-border-opacity: .3; width: 19rem;">
            <div class="d-flex inline justify-content-between">
                <p class="my-0 mt-2 mx-3">{{ Str::padLeft($pokemon->id, 5, '#000') }}</p>
                <p class="my-0 mt-2 mx-3">{{ $pokemon->is_legendary == 0 ? 'Normal Pokemon' : 'Legendary Pokemon'}}</p>
            </div>
            <div class="mx-auto" style="width: 200px">
                <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" class="img-fluid py-3 mb-1" alt="{{ $pokemon->name }}">
            </div>
            <div class="d-flex inline justify-content-between">
                <div class="mx-3">
                    <h2 class="fw-bold mb-0">{{ $pokemon->name }}</h2>
                    <h5 class="fw-bold">{{ $pokemon->species }}</h5>
                </div>
                <div class="text-end mx-3">
                    <p class="badge rounded-pill text-bg-success fs-5">{{ $pokemon->primary_type }}</p>
                </div>
            </div>
            <div class="d-flex inline justify-content-between">
                <div class="mx-3 py-3">
                    <p class="d-inline"><i class="fa-solid fa-weight-hanging"></i> {{ $pokemon->weight }}</p>
                    <p class="d-inline"><i class="fa-solid fa-ruler-vertical"></i> {{ $pokemon->height }}</p>
                    <p class="d-inline"><i class="fa-solid fa-heart"></i> {{ $pokemon->hp }}</p>
                </div>
                <div class="mx-3 text-end py-3">
                    <p class="d-inline"><i class="fa-solid fa-hand-fist"></i> {{ $pokemon->attack }}</p>
                    <p class="d-inline"><i class="fa-solid fa-shield"></i> {{ $pokemon->defense }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
