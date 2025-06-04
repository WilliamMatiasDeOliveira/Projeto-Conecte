<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [];

        for($i = 1; $i < 11; $i++){
                $dados[] = [
                    'tipo'=>'cuidador',
                    'nome'=>'cuidador'.$i,
                    'email'=>"cuidador$i@email.como",
                    'telefone'=>"2222222222",
                    'cpf'=>"22222222222",
                    'cidade'=>"cidade".$i,
                    'bairro'=>'bairro'.$i,
                    'rua'=>"rua".$i,
                    'password'=>Hash::make('12345678'),
                    'foto'=>"2b8b8693e61bf9db64d6d664fcc222f5.jpg",
                    'curriculo'=>"9cc15266e2fb8f7b1e6d1d10fa871a52.pdf"

                ];
            }

        DB::table('users')->insert($dados);

    }
}
