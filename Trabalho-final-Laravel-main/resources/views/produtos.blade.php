<!doctype html>
<!-- O Bootstrap le o cookie aqui para aplicar as cores -->
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    
<nav class="mb-4 border-bottom pb-3 d-flex justify-content-between align-items-center">
    <div>
        <a href="/produtos" class="btn btn-primary me-2">Produtos</a>
        <a href="/categorias" class="btn btn-outline-secondary">Categorias</a>
    </div>
    
    <div>
        <a href="{{ route('trocar.tema') }}" class="btn btn-secondary">
            {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
        </a>
        
        </div>
</nav>

    <h1>Produtos</h1>

    <!-- Mensagens de Sucesso -->
    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    <!-- Erros de Validação -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de Cadastro -->
    <form action="/produtos" method="POST" class="mb-5 p-4 border rounded bg-body-tertiary" enctype="multipart/form-data">
        @csrf
        <h4>Novo Produto</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="imagem" class="form-label">Imagem (PNG/JPG)</label>
                <input type="file" class="form-control" id="imagem" name="imagem" accept="image/png, image/jpeg">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar Produto</button>
    </form>

    <hr>

    <h2>Lista de Produtos</h2>
    @if($produtos->isEmpty())
        <p class="text-muted">Nenhum produto cadastrado.</p>
    @else
        <ul class="list-group">
            @foreach($produtos as $produto)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    
                    <div class="d-flex align-items-center">
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Foto" width="50" height="50" class="rounded me-3 border object-fit-cover">
                        @else
                            <div class="bg-secondary rounded me-3 d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px;">
                                <small>Sem foto</small>
                            </div>
                        @endif
                        <span class="fw-bold fs-5">{{ $produto->nome }}</span>
                    </div>

                    <div>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning me-1">Editar</a>

                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>
    @endif

    <!-- Rodapé com Cookie -->
    <footer class="mt-5 text-muted border-top pt-3 text-center">
        @if(Cookie::get('ultimo_acesso'))
            <small>Último acesso em: <strong>{{ Cookie::get('ultimo_acesso') }}</strong></small>
        @else
            <small>Bem-vindo ao sistema.</small>
        @endif
        <br>
        <small>&copy; 2025 Sistema Laravel Completo</small>
    </footer>
</div>
</body>
</html>