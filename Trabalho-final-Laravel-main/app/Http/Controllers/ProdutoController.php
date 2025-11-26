<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ProdutoController extends Controller
{
    // 1. LISTAR
    public function index()
    {
        $produtos = Produto::all();
        cookie()->queue('ultimo_acesso', date('H:i'), 60);
        return view('produtos', compact('produtos')); 
    }

    // 2. CRIAR
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $caminho = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $caminho;
        }

        Produto::create($dados);
        return redirect('/produtos')->with('sucesso', 'Produto criado com sucesso!');
    }

    // 3. TELA DE EDIÇÃO
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('edit', compact('produto'));
    }

    // 4. ATUALIZAR
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $dados['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($dados);
        return redirect('/produtos')->with('sucesso', 'Produto atualizado!');
    }

    // 5. EXCLUIR
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        $produto->delete();
        return redirect('/produtos')->with('sucesso', 'Produto excluído!');
    }

    // TEMA ESCURO
    public function trocarTema()
    {
        $temaAtual = \Illuminate\Support\Facades\Cookie::get('tema', 'light');
        $novoTema = ($temaAtual == 'light') ? 'dark' : 'light';
        return back()->withCookie(cookie('tema', $novoTema, 43200));
    }
}