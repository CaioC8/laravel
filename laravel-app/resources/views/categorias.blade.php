<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f7f6;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .form-divider {
            margin: 30px 0;
        }

        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn-sm {
            padding: 8px 12px;
            font-weight: normal;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1>Gerenciamento de Categorias</h1>

        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
            Ir para Produtos
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h2>Cadastrar Nova Categoria</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Categoria</button>
    </form>

    <hr class="form-divider">

    <div class="list-header">
        <h2>Categorias Cadastradas</h2>

        @if($categorias->isNotEmpty())
        <form action="{{ route('categorias.destroyAll') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir todas as categorias?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                Excluir Todas
            </button>
        </form>
        @endif
    </div>

    @if($categorias->isEmpty())
    <p>Nenhuma categoria cadastrada ainda.</p>
    @else
    <ul>
        @foreach($categorias as $categoria)
        <li>{{ $categoria->nome }}</li>
        @endforeach
    </ul>
    @endif

</body>

</html>