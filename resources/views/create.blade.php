<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un film</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>
    @extends('layouts.index')
    @section('content')
    <h1>Ajouter un nouveau film </h1>


    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Titre :</label>
        @if ($errors->has('title'))
        <div style="color: red; margin-bottom: 10px;">
            <p>{{ $errors->first('title') }}</p>
        </div>
        @endif
        <input type="text" name="title" id="title" required>

        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="4"></textarea>

        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre">

        <label for="year">Année :</label>
        @if ($errors->has('year'))
        <div style="color: red; margin-bottom: 10px;">
            <p>{{ $errors->first('year') }}</p>
        </div>
        @endif

        <input type="number" name="year" id="year">

        <label for="image">Image :</label>
        <input type="file" name="image" id="image" accept="image/*">

        <button type="submit">Enregistrer</button>
    </form>
    </div>
    @endsection

</body>

</html>