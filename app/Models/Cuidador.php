<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuidador extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'curriculo',
        'like',
        'usuario_id'
    ];

    protected $table = 'cuidadores'; 
}
