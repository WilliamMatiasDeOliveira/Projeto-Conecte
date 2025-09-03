<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'senha',
        'telefone',
        'foto',
        'tipo'
    ];
    protected $hidden = ['senha'];

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }

    public function clientes(){
        return $this->hasMany(Cliente::class);
    }

    public function cuidadores(){
        return $this->hasMany(Cuidador::class);
    }





}
