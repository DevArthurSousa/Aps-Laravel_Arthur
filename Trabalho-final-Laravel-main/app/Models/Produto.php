<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // A lista $fillable libera quais campos podem ser salvos no banco
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem', 
    ];
}