<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ["usuario_id"];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function contratos(){
        return $this->hasMany(Contrato::class);
    }
}
