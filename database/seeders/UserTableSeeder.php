<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    'password'=>"12345678",
                    'foto'=>"f9e70a7fcc58ac692b7b6f508d5af524.jpg)",
                    'curriculo'=>"191ce55c54c81d6574684d78267f4220.pdf"

                ];
            }

        DB::table('users')->insert($dados);

    }
}
