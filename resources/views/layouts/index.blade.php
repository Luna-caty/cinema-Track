<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Films</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-links {
            display: flex;
            gap: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            border-left: 4px solid #28a745;
            background-color: #d4edda;
            color: #155724;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            color: #0c5460;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
            margin: 2px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .card-text {
            color: #666;
            margin-bottom: 15px;
        }

        .films-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-section h1 {
            color: #333;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand">🎬 Gestion Films</a>
            <div class="navbar-links">
                <a href="{{ route('movies') }}" class="btn btn-primary">Liste des films</a>
                <a href="{{ route('create') }}" class="btn btn-info">Ajouter un film</a>
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