@extends('layouts.index')

@section('title', $movie->title . ' - Détails')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/movie-details.css') }}">
@endpush

@section('content')
<div class="movie-detail">
    <div class="movie-poster-box">
        @if ($movie->image)
        <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}" class="movie-poster">
        @else
        <img src="https://via.placeholder.com/300x450/333/fff?text={{ urlencode($movie->title) }}" alt="No image" class="movie-poster">
        @endif
    </div>

    <div class="movie-info-box">
        <h1 class="movie-title">{{ $movie->title }}</h1>
        <p><strong>Genre :</strong> {{ $movie->genre }}</p>
        <p><strong>Année :</strong> {{ $movie->year }}</p>
        <p><strong>Note :</strong> ⭐ {{ $movie->rating ?? 'N/A' }}</p>

        @if (!empty($movie->description))
        <p style="margin-top: 1rem;"><strong>Résumé :</strong><br>{{ $movie->description }}</p>
        @endif
    </div>
</div>
<a href="{{ route('home') }}" class="btn-details" style="margin: 20px 0; display:inline-block;">← Retour à la liste</a>

@endsection