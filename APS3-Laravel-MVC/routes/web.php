<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;


// MOSTRA a lista na página inicial
Route::get('/', [CategoriaController::class, 'index']);

// MOSTRA a lista também em /categorias (opcional, se você quiser)
Route::get('/categorias', [CategoriaController::class, 'index']);

// SALVA uma nova categoria quando o formulário é enviado
Route::post('/categorias', [CategoriaController::class, 'store']);

// Rotas de Produtos (exemplo)
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);