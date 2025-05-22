<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuidador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_submit(Request $request)
    {
        $request->validate(
            // regras
            [
                'email' => 'required|email',
                'password' => 'required|min:8|max:16'
            ],
            // menssagen
            [
                'email.required' => 'Este campo é obrigatório',
                'email.email' => 'Este não é um E-mail válido',

                'password.required' => 'Este campo é obrigatório',
                'password.min' => 'A senha deve ter no minimo :min caracteres',
                'password.max' => 'A senha deve ter no minimo :max caracteres',

            ]
        );

        // check is cliente
        $cliente  = Cliente::where('email', $request->email)->first();

        if ($cliente && Hash::check($request->password, $cliente->password)) {
            echo "EU SOU CLIENTE";
        }

        $cuidador = Cuidador::where('email', $request->email)->first();

        if ($cuidador && Hash::check($request->password, $cuidador->password)) {
            echo "EU SOU UM CUIDADOR";
        }
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
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

                'foto.mimes' => 'Este arquivo deve ser do tipo jpg, jpeg ou png',
                'foto.max' => 'O arquivo não deve sser maior que 2048 kb'
            ]
        );

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $extension = $request->foto->extension();

            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // path, name
            $request->foto->move(public_path('/assets/imgs/clientes/'), $image_name);
        }

        Cliente::create([
            'papel' => $request->papel,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'password' => Hash::make($request->password),
            'foto' => $image_name ?? null,
        ]);

        $msg_success = "Seu cadastro foi feito com Sucesso !";

        return redirect()
            ->route('login')
            ->with('create_user_success', compact('msg_success'));
    }

    public function form_cuidador_submit(Request $request)
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
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                // 'curriculo' => 'nullable|mimes:pdf,docx|max:2048',
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

                'foto.mimes' => 'Este arquivo deve ser do tipo jpg, jpeg ou png',
                'foto.max' => 'O arquivo não deve sser maior que 2048 kb'
            ]
        );

        // Para foto
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $extension = $request->foto->extension();
            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->foto->move(public_path('/assets/imgs/cuidadores/'), $image_name);
        } else {
            $image_name = null;
        }

        // Para currículo (PDF, DOCX, etc)
        if ($request->hasFile('curriculo') && $request->file('curriculo')->isValid()) {
            $extension = $request->curriculo->extension();
            $curriculo_name = md5($request->curriculo->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->curriculo->move(public_path('/assets/imgs/curriculos/'), $curriculo_name);
        } else {
            $curriculo_name = null;
        }

        // Agora salve no banco com nomes distintos
        Cuidador::create([
            'papel' => $request->papel,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'password' => Hash::make($request->password),
            'foto' => $image_name,
            'curriculo' => $curriculo_name,
        ]);


        $msg_success = "Seu cadastro foi feito com Sucesso !";

        return redirect()
            ->route('login')
            ->with('create_user_success', compact('msg_success'));
    }
}
