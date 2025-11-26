<!doctype html>
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">

<nav class="mb-4 border-bottom pb-3 d-flex justify-content-between align-items-center">
    <div>
        <a href="/produtos" class="btn btn-outline-primary me-2">Gerenciar Produtos</a>
        <a href="/categorias" class="btn btn-secondary">Gerenciar Categorias</a>
    </div>
    
    <div>
        <a href="{{ route('trocar.tema') }}" class="btn btn-secondary">
            {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
        </a>
    </div>
</nav>

    <h1>Categorias</h1>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    <!-- Formulário Simples -->
    <form action="/categorias" method="POST" class="mb-4 p-4 border rounded bg-body-tertiary">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Categoria</button>
    </form>

    <h2>Lista</h2>
    <ul class="list-group">
        @foreach($categorias as $categoria)
            <li class="list-group-item">{{ $categoria->nome }}</li>
        @endforeach
    </ul>

</div>
</body>
</html> 