<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Films</title>
    <style>
        .movie-card {
            background: white;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 12px;
            display: flex;
            gap: 20px;
            align-items: flex-start;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .movie-card:hover {
            transform: translateY(-4px);
        }

        .movie-card img {
            width: 120px;
            height: auto;
            border-radius: 6px;
        }

        .movie-info {
            flex: 1;
        }

        .movie-info h2 {
            margin: 0 0 10px;
            color: #222;
            font-size: 1.5rem;
        }

        .movie-info p {
            margin: 6px 0;
            color: #555;
            font-size: 14px;
        }

        .movie-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    @extends('layouts.index')
    @section('content')
    <h1 style="margin-bottom: 30px;">Liste des films 📽️</h1>

    @if ($movies->count())
    @foreach ($movies as $movie)
    <div class="movie-card">
        @if ($movie->image)
        <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}">
        @else
        <img src="https://via.placeholder.com/120x180?text=No+Image" alt="No image">
        @endif

        <div class="movie-info">
            <h2>{{ $movie->title }}</h2>
            <p><strong>Genre :</strong> {{ $movie->genre }}</p>
            <p><strong>Année :</strong> {{ $movie->year }}</p>
            <p>{{ $movie->description }}</p>
        </div>

        <div class="movie-actions">
            <form action="{{ route('destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Supprimer ce film ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>

            </form>
            <a href="{{ route('edit', $movie->id) }}" class="btn btn-warning btn-sm" style="background-color: #ffc107; color: #212529; margin-left: 10px; border: none;">
                Modifier
            </a>
        </div>
    </div>
    @endforeach
    @else
    <p>Aucun film trouvé dans la base de données.</p>
    @endif
    @endsection
</body>

</html>