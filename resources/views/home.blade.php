@extends('layouts.index')

@section('title', 'Accueil des films')

@section('content')
<div class="movies-container">
    <div class="header-section">
        <h1>Découvrez les films <span class="cinema-icon">🎬</span></h1>
        <div class="search-container">
            <input type="text" placeholder="Rechercher un film..." class="search-input">
            <button class="search-btn">🔍</button>
        </div>
    </div>

    {{-- <div class="genre-filter">
        <button class="genre-btn active">Tous</button>
        <button class="genre-btn">Action</button>
        <button class="genre-btn">Aventure</button>
        <button class="genre-btn">Drame</button>
        <button class="genre-btn">Comédie</button>
        <button class="genre-btn">Horreur</button>
    </div> --}}

    @if ($movies->count())
    <div class="movies-grid">
        @foreach ($movies as $movie)
        <div class="movie-card">
            <img src="{{ $movie->image ? asset('images/' . $movie->image) : 'https://via.placeholder.com/300x450/333/fff?text=' . urlencode($movie->title) }}"
                alt="{{ $movie->title }}" class="movie-poster">

            <div class="movie-info">
                <h3 class="movie-title">{{ $movie->title }}</h3>
                <div class="movie-meta">
                    <span>⭐ {{ $movie->rating ?? 'N/A' }}</span>
                    <span>{{ $movie->year }}</span>
                </div>
                <p class="movie-genre">{{ $movie->genre }}</p>
                <div class="movie-actions">
                    <button class="btn-watchlist">+ Watchlist</button>
                    <button class="btn-details">Détails</button>
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
