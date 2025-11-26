<!doctype html>
<html lang="pt-br" data-bs-theme="{{ Cookie::get('tema', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
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
        .current-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            border: 4px solid var(--bs-secondary-bg);
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
                            <a class="nav-link text-primary" href="/produtos">⬅ Voltar aos Produtos</a>
                        </div>
                        <a href="{{ route('trocar.tema') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                            {{ Cookie::get('tema') == 'dark' ? '☀️ Claro' : '🌙 Escuro' }}
                        </a>
                    </nav>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-header bg-warning text-dark py-3" style="border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0 text-center fw-bold">✏️ Editar Produto</h5>
                </div>
                
                <div class="card-body p-4">
                    
                    @if($errors->any())
                        <div class="alert alert-danger shadow-sm mb-4">
                            <ul class="mb-0 small">
                                @foreach($errors->all() as $error)
                                    <li>⚠️ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        <div class="mb-4">
                            <label for="nome" class="form-label fw-bold">Nome do Prato</label>
                            <input type="text" class="form-control form-control-lg" id="nome" name="nome" value="{{ $produto->nome }}" required>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <label class="form-label text-muted small d-block">Imagem Atual</label>
                                @if($produto->imagem)
                                    <img src="{{ asset('storage/' . $produto->imagem) }}" class="current-img shadow-sm" alt="Imagem Atual">
                                @else
                                    <div class="current-img d-flex align-items-center justify-content-center bg-secondary text-white mx-auto">
                                        <span class="fs-1">📷</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-8">
                                <label for="imagem" class="form-label fw-bold">Trocar Foto (Opcional)</label>
                                <input type="file" class="form-control" id="imagem" name="imagem" accept="image/png, image/jpeg">
                                <div class="form-text">Se não quiser mudar a foto, deixe este campo vazio.</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between gap-2">
                            <a href="/produtos" class="btn btn-outline-secondary px-4">
                                ❌ Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-5 fw-bold flex-grow-1">
                                ✅ Salvar Alterações
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <footer class="mt-4 text-center text-muted small">
                <p>&copy; 2025 Sistema Laravel - Restaurante</p>
            </footer>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>