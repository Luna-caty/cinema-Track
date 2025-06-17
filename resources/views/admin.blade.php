<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">🎬 Admin Panel</a>
            <div class="navbar-links">
                <a href="{{ route('create') }}" class="nav-link">➕ Ajouter un film</a>
            
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link" style="background:none; border:none;">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">🎛️ Tableau de bord - Administrateur</h1>

        @if ($movies->count())
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Affiche</th>
                        <th>Titre</th>
                        <th>Genre</th>
                        <th>Année</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <td>
                            @if ($movie->image)
                            <img src="{{ asset('images/' . $movie->image) }}" class="admin-thumbnail" alt="{{ $movie->title }}">
                            @else
                            <span class="no-img">Aucune</span>
                            @endif
                        </td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->year }}</td>
                        <td class="admin-actions">
                            <a href="{{ route('edit', $movie->id) }}" class="btn-watchlist">✏️ Modifier</a>
                            <form action="{{ route('destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Supprimer ce film ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-details">🗑 Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="no-movies">Aucun film enregistré pour le moment.</p>
        @endif
    </div>
</body>

</html>