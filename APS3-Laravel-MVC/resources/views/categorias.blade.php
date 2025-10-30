<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    
    <h1 class="text-center mb-4 text-primary-emphasis">Gestão de Categorias</h1>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ops! Ocorreram os seguintes erros:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <strong>Cadastrar Nova Categoria</strong>
        </div>
        <div class="card-body">
            <form action="/categorias" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome da Categoria:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Categorias Existentes</strong>
        </div>
        <div class="card-body">
            
            <table class="table table-hover table-striped">
                
                <thead class="table-dark">
                    <tr>
                        <th scope="col"># ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Atualizado em</th>
                    </tr>
                </thead>
                
                <tbody>
                    
                    @forelse($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td>{{ $categoria->nome }}</td>
                            
                            <td>{{ $categoria->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $categoria->updated_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Nenhuma categoria foi cadastrada ainda.
                            </td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</body>
</html>