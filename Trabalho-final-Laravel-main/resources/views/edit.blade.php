<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h1>Editar Produto</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        @csrf
        @method('PUT') <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Atual</label><br>
            @if($produto->imagem)
                <img src="{{ asset('storage/' . $produto->imagem) }}" width="100" class="img-thumbnail mb-2">
            @else
                <p class="text-muted">Sem imagem cadastrada.</p>
            @endif

            <label for="imagem" class="form-label d-block">Trocar Imagem (Opcional)</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/png, image/jpeg">
        </div>

        <div class="d-flex justify-content-between">
            <a href="/produtos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>
</body>
</html>