<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un film</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            background-color: #fff;
            padding: 25px 30px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @extends('layouts.index')
    @section('content')
    <h1>Ajouter un nouveau film </h1>


    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="4"></textarea>

        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre">

        <label for="year">Année :</label>
        <input type="number" name="year" id="year">

        <label for="image">Image :</label>
        <input type="file" name="image" id="image" accept="image/*">

        <button type="submit">Enregistrer</button>
    </form>
    </div>
    @endsection

</body>

</html>