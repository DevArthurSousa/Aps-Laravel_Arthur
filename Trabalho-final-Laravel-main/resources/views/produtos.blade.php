<!doctype html>
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: var(--bs-body-bg);
            transition: background-color 0.3s;
        }
        .card-custom {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: none;
            border-radius: 12px;
        }
        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid var(--bs-primary);
        }
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid var(--bs-border-color);
        }
        .img-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            background-color: var(--bs-secondary-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
    </style>
</head>
<body class="bg-body-tertiary py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="card card-custom mb-4">
                <div class="card-body py-2">
                    <nav class="nav justify-content-between align-items-center">
                        <div class="d-flex gap-3">
                            <a class="nav-link active text-primary" href="/produtos">📦 Produtos</a>
                            <a class="nav-link text-body-secondary" href="/categorias">🏷️ Categorias</a>
                        </div>
                        <a href="{{ route('trocar.tema') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                            {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
                        </a>
                    </nav>
                </div>
            </div>

            <div class="text-center mb-4">
                <h2 class="fw-bold">Cardápio de Produtos</h2>
                <p class="text-muted">Gerencie os itens e fotos do seu sistema</p>
            </div>

            @if(session('sucesso'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    ✅ {{ session('sucesso') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0 small">
                        @foreach($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-custom mb-4">
                <div class="card-header bg-success text-white py-3" style="border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0 text-center">✨ Novo Produto</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/produtos" method="POST" enctype="multipart/form-data" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-5">
                            <label for="nome" class="form-label fw-bold">Nome do Produto</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Ex: X-Bacon" required>
                        </div>
                        <div class="col-md-5">
                            <label for="imagem" class="form-label fw-bold">Foto (Opcional)</label>
                            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/png, image/jpeg">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100 fw-bold">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-bottom">
                        <li class="list-group-item bg-light fw-bold text-uppercase text-muted small p-3">
                            Itens Disponíveis
                        </li>

                        @forelse($produtos as $produto)
                            <li class="list-group-item p-3 d-flex align-items-center justify-content-between hover-effect">
                                
                                <div class="d-flex align-items-center gap-3">
                                    @if($produto->imagem)
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Foto" class="product-img shadow-sm">
                                    @else
                                        <div class="img-placeholder shadow-sm" title="Sem foto">📷</div>
                                    @endif
                                    
                                    <div>
                                        <h5 class="mb-0 fw-bold">{{ $produto->nome }}</h5>
                                        <small class="text-muted">ID: #{{ $produto->id }}</small>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-outline-warning">
                                        ✏️ Editar
                                    </a>

                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja apagar este prato?')">
                                            🗑️ Excluir
                                        </button>
                                    </form>
                                </div>

                            </li>
                        @empty
                            <li class="list-group-item p-5 text-center text-muted">
                                🍽️ A cozinha está vazia. Cadastre o primeiro produto!
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <footer class="mt-4 text-center text-muted small">
                @if(Cookie::get('ultimo_acesso'))
                    <p>🕒 Último acesso: {{ Cookie::get('ultimo_acesso') }}</p>
                @endif
                <p>&copy; 2025 Sistema Laravel - Restaurante</p>
            </footer>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>