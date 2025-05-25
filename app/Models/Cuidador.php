<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cuidador extends Authenticatable
{
    use Notifiable;
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
