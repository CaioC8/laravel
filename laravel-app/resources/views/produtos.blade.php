<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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

        input[type="text"],
        input[type="number"],
        textarea {
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

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
        <h1>Gerenciamento de Produtos</h1>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            Ir para Categorias
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

    <h2>Cadastrar Novo Produto</h2>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="{{ old('preco') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Produto</button>
    </form>

    <hr class="form-divider">

    <div class="list-header">
        <h2>Produtos Cadastrados</h2>

        @if($produtos->isNotEmpty())
        <form action="{{ route('produtos.destroyAll') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir todos os produtos?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                Excluir Todos
            </button>
        </form>
        @endif
    </div>

    @if($produtos->isEmpty())
    <p>Nenhum produto cadastrado ainda.</p>
    @else
    <ul>
        @foreach($produtos as $produto)
        <li>
            <strong>{{ $produto->nome }}</strong>
            @if($produto->descricao) - {{ $produto->descricao }} @endif
            - R$ {{ number_format($produto->preco, 2, ',', '.') }}
        </li>
        @endforeach
    </ul>
    @endif
</body>

</html>