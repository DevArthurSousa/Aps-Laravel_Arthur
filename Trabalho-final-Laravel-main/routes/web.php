<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

// --- ROTAS PÚBLICAS (Sistema Funcional) ---

// Home
Route::get('/', [ProdutoController::class, 'index']);

// CRUD de Produtos (Rotas Manuais)
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create'); 
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store'); 
Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit'); 
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update'); 
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy'); 

// Rotas de Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);

// Trocar Tema (Cookie)
Route::get('/trocar-tema', [ProdutoController::class, 'trocarTema'])->name('trocar.tema');