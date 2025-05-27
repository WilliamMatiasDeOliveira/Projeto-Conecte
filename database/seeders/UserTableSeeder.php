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
                    'foto'=>"{{asset('assets/imgs/cuidadores/af49fcd30f99601e11a10e2f856ba7b6.jpg')}}",
                    'curriculo'=>"public/assets/imgs/curriculos/758b1dab55e2855d0193dcf02771ed3e.pdf"

                ];
            }

        DB::table('users')->insert($dados);

    }
}
