<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .edit-container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .edit-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #556cd6, #5e3e96);
        }
    </style>
</head>

<body>
    @extends('layouts.index')

    @section('content')
    <div class="container">
        <h1>Modifier le film 🎬</h1>

        <form action="{{ route('update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Titre</label>
            <input type="text" name="title" value="{{ $movie->title }}" required>

            <label>Description</label>
            <textarea name="description">{{ $movie->description }}</textarea>

            <label>Genre</label>
            <input type="text" name="genre" value="{{ $movie->genre }}">

            <label>Année</label>
            <input type="number" name="year" value="{{ $movie->year }}">

            <label>Image</label>
            <input type="file" name="image">

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
    @endsection

</body>

</html>