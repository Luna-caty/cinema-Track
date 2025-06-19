@extends('layouts.index')

@section('title', 'Le Clap')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@section('content')
<div class="movies-container">
    <div class="header-section">
        <h3>Découvrez les films <span class="cinema-icon">🎬</span></h3>
        <div class="search-container">
            <input type="text" placeholder="Rechercher un film..." class="search-input">
            <button class="search-btn">🔍</button>
        </div>
    </div>
    @if ($movies->count())
    <div class="movies-grid">
        @foreach ($movies as $movie)
        <div class="movie-card">
            <img src="{{ $movie->image ? asset('images/' . $movie->image) : 'https://via.placeholder.com/300x450/333/fff?text=' . urlencode($movie->title) }}"
                alt="{{ $movie->title }}" class="movie-poster">

            <div class="movie-info">
                <h3 class="movie-title">{{ $movie->title }}</h3>
                <div class="movie-meta">
                    <span>{{ $movie->year }}</span>
                </div>
                <p class="movie-genre">{{ $movie->genre }}</p>
                <div class="movie-actions">
                    <a href="{{ route('show', $movie->id) }}" class="btn-details"> Voir Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="no-movies">Aucun film trouvé dans la base de données.</p>
    @endif
</div>
@endsection