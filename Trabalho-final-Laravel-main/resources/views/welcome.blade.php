<!doctype html>
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo ao Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: var(--bs-body-bg);
            transition: background-color 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-menu {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 15px;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
            border-color: var(--bs-primary);
        }
        .icon-large {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid var(--bs-primary);
        }
    </style>
</head>
<body class="bg-body-tertiary">

<div class="container mt-4">
    <nav class="navbar navbar-expand-lg bg-white rounded-3 shadow-sm px-4 py-2">
        <a class="navbar-brand fw-bold text-primary" href="/">🚀 RestauranteSystem</a>
        <div class="ms-auto">
            <a href="{{ route('trocar.tema') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
            </a>
        </div>
    </nav>
</div>

<div class="container hero-section">
    <div class="text-center w-100" style="max-width: 900px;">
        
        <h1 class="display-4 fw-bold mb-3">Bem-vindo Chef! 👨‍🍳</h1>
        <p class="lead text-muted mb-5">O que deseja gerenciar na sua cozinha hoje?</p>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-5">
                <a href="/produtos" class="card card-menu bg-white shadow-sm p-4 d-block">
                    <div class="card-body">
                        <div class="icon-large">🍔</div>
                        <h3 class="fw-bold text-primary">Gerenciar Menu</h3>
                        <p class="text-muted small">Cadastrar, editar e remover pratos e bebidas.</p>
                        <span class="btn btn-primary rounded-pill px-4 mt-2">Acessar Produtos</span>
                    </div>
                </a>
            </div>

            <div class="col-md-5">
                <a href="/categorias" class="card card-menu bg-white shadow-sm p-4 d-block">
                    <div class="card-body">
                        <div class="icon-large">🏷️</div>
                        <h3 class="fw-bold text-secondary">Organizar Adega</h3>
                        <p class="text-muted small">Criar e gerenciar categorias para o seu estoque.</p>
                        <span class="btn btn-secondary rounded-pill px-4 mt-2">Acessar Categorias</span>
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>

<footer class="text-center text-muted py-4 small">
    @if(Cookie::get('ultimo_acesso'))
        <p class="mb-1">🕒 Seu último login foi em: {{ Cookie::get('ultimo_acesso') }}</p>
    @endif
    <p>&copy; 2025 APS Laravel - Sistema de Restaurante</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>