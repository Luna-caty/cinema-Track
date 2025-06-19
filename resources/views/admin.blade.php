
@extends('layouts.index')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('title', 'Le Clap - Espace Admin')
@section('content')
    <div class="container">

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
                        <td class="btn-action">
                            <a href="{{ route('edit', $movie->id) }}" class="btn-modify ">✏️ Modifier</a>
                            <form action="{{ route('destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Supprimer ce film ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete ">🗑 Supprimer</button>
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
@endsection