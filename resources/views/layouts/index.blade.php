<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Films</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🎬 Gestion Films</a>

            <div class="navbar-links">
                <a href="{{ route('home') }}" class="nav-link">Accueil</a>
                <a href="{{ route('series') }}" class="nav-link">Séries</a>
                <a href="{{ route('movies') }}" class="nav-link">Films</a>
                <a href="{{ route('animes') }}" class="nav-link">Animés</a>
                <a href="{{ route('about') }}" class="nav-link">À propos</a>

                
            </div>
        </div>
    </nav>



    <div class="container">
        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </div>

</body>

</html>