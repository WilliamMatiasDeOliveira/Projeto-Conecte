<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $table = 'cuidadores';  // <-- força usar o nome correto da tabela
    
    protected $fillable = [
        'papel',
        'nome',
        'email',
        'telefone',
        'cpf',
        'cidade',
        'bairro',
        'rua',
        'password',
        'foto',
        'curriculo'
    ];
}
