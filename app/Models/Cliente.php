<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;
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
        'foto'
    ];
}
