<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $fillable = [
        "usuario_id",
        "curriculo",
        "like"
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function especialidades(){
        return $this->belongsToMany(Especialidade::class);
    }

    public function contratos(){
        return $this->hasMany(Contrato::class);
    }
}
