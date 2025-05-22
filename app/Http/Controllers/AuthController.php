<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_submit(Request $request){
        $request->validate(
            // regras
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:16'
            ],
            // menssagen
            [
                'email.required'=>'Este campo é obrigatório',
                'email.email'=>'Este não é um E-mail válido',

                'password.required'=>'Este campo é obrigatório',
                'password.min'=>'A senha deve ter no minimo :min caracteres',
                'password.max' => 'A senha deve ter no minimo :max caracteres',

            ]
        );

        
    }

    public function form_cliente_submit(Request $request)
    {
        $request->validate(
            // regras
            [
                'nome' => 'required|string',
                'email' => 'required|email',
                'telefone' => 'required|string',
                'cpf' => 'required|string|size:11',
                'cidade' => 'required|string',
                'bairro' => 'required|string',
                'rua' => 'required|string',
                'password' => 'required|min:8|max:16|confirmed',
                'foto' => 'string',
            ],
            // menssagens
            [
                'nome.required' => 'Este campo é obrigatório',

                'email.required' => 'Este campo é obrigatório',
                'email.email' => 'Este não é um E-mail válido',

                'telefone.required' => 'Este campo é obrigatório',

                'cpf.required' => 'Este campo é obrigatório',
                'cpf.size' => 'Este campo deve ter :size caracteres',

                'cidade.required' => 'Este campo é obrigatório',

                'bairro.required' => 'Este campo é obrigatório',

                'rua.required' => 'Este campo é obrigatório',

                'password.required' => 'Este campo é obrigatório',
                'password.min' => 'A senha deve ter no minimo :min caracteres',
                'password.max' => 'A senha deve ter no minimo :max caracteres',
            ]
        );

        if ($request->hasFile('foto') && $request->file('foto')->isValid())
        {
            $extension = $request->foto->extension();

            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // path, name
            $request->foto->move(public_path('/assets/imgs/clientes/'), $image_name);
        }

        Cliente::insert([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'password' => Hash::make($request->password),
            'foto' => $image_name,
        ]);

        $msg_success = "Seu cadastro foi feito com Sucesso !";

        return redirect()
            ->route('login')
            ->with('create_cliente_success', compact('msg_success'));
    }
}
