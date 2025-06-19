@extends('layouts.index')

@section('title', 'Le Clap-Ajouter un film')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush
@section('content')
<h1>Ajouter un nouveau film</h1>

<div class="form-container">
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
        <label for='type'>Type :</label>
        <select name="type" id="type">
            <option value="" disabled selected hidden>Choisissez un type</option>
            <option value="movie">Film</option>
            <option value="series">Série</option>
            <option value="anime">Animé</option>
        </select>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image" accept="image/*">

        <button type="submit" class="form-submit-btn">Enregistrer</button>
    </form>
</div>
@endsection