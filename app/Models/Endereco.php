<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cep',
        'cidade',
        'bairro',
        'rua'
    ];
}
