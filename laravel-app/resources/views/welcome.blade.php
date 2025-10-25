<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        .welcome-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            gap: 20px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="welcome-container">
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
            Ir para Produtos
        </a>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            Ir para Categorias
        </a>
    </div>
</body>

</html>