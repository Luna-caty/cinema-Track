<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Le Clap')</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    @stack('styles')
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand-section">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                <a class="navbar-brand" href="{{ route('home') }}">Le Clap</a>
            </div>

            <div class="navbar-links">
                @auth
                @if (Auth::user()->role === 'admin')
                <div class="admin-nav-wrapper">
                    <span class="admin-dashboard-title">Espace Admin</span>
                    <div class="admin-nav-right">
                        <a href="{{ route('create') }}" class="nav-link">➕ Ajouter un film</a>
                        
                    </div>
                </div>
                @else
                <a href="{{ route('home') }}" class="nav-link">Accueil</a>
                <a href="{{ route('series') }}" class="nav-link">Séries</a>
                <a href="{{ route('movies') }}" class="nav-link">Films</a>
                <a href="{{ route('animes') }}" class="nav-link">Animés</a>
                <a href="{{ route('about') }}" class="nav-link">À propos</a>
                @endif
                @endauth

                @guest
                <div class="auth-links">
                    <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                    <span class="separator">/</span>
                    <a href="{{ route('register') }}" class="nav-link">Créer un compte</a>
                </div>
                @endguest

                @auth
                <div class="user-dropdown">
                    <button class="user-button">
                        👤 {{ Auth::user()->name }}
                        <span class="dropdown-arrow">▼</span>
                    </button>
                    <div class="dropdown-content">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Déconnexion</button>
                        </form>
                    </div>
                </div>
                @endauth
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userButton = document.querySelector('.user-button');
            const dropdown = document.querySelector('.user-dropdown');

            if (userButton && dropdown) {
                userButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                });

                document.addEventListener('click', function() {
                    dropdown.classList.remove('active');
                });
            }
        });
    </script>

</body>

</html>