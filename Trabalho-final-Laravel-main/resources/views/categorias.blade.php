<!doctype html>
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciar Categorias</title>
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
    </style>
</head>
<body class="bg-body-tertiary py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card card-custom mb-4">
                <div class="card-body py-2">
                    <nav class="nav justify-content-between align-items-center">
                        <div class="d-flex gap-3">
                            <a class="nav-link text-body-secondary" href="/produtos">📦 Produtos</a>
                            <a class="nav-link active text-primary" href="/categorias">wmv Categorias</a>
                        </div>
                        <a href="{{ route('trocar.tema') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                            {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
                        </a>
                    </nav>
                </div>
            </div>

            <div class="text-center mb-4">
                <h2 class="fw-bold">Categorias</h2>
                <p class="text-muted">Adicione e visualize as categorias do sistema</p>
            </div>

            @if(session('sucesso'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    ✅ {{ session('sucesso') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card card-custom mb-4">
                <div class="card-header bg-primary text-white py-3" style="border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0 text-center">Nova Categoria</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/categorias" method="POST" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-9">
                            <label for="nome" class="form-label fw-bold">Nome da Categoria</label>
                            <input type="text" class="form-control form-control-lg" id="nome" name="nome" placeholder="Ex: Bebidas, Limpeza..." required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                ➕ Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-bottom">
                        <li class="list-group-item bg-light fw-bold text-uppercase text-muted small p-3">
                            Categorias Cadastradas
                        </li>
                        @forelse($categorias as $categoria)
                            <li class="list-group-item p-3 d-flex justify-content-between align-items-center">
                                <span class="fw-medium">{{ $categoria->nome }}</span>
                                <span class="badge bg-secondary rounded-pill">ID: {{ $categoria->id }}</span>
                            </li>
                        @empty
                            <li class="list-group-item p-5 text-center text-muted">
                                📂 Nenhuma categoria cadastrada ainda.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>