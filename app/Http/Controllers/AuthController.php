<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        $user = Usuario::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // autenticar o usuario
                Auth::login($user);

                if ($user->tipo == 'cliente') {
                    // pegar todos os cuidadores
                    $cuidadores = Usuario::where('tipo', 'cuidador')->get();
                    Session::put('cuidadores', $cuidadores);

                    return view('Auth.dashboard-cliente');
                }

                if ($user->tipo == 'cuidador') {
                    // pegar todos os cuidadores
                    return view('Auth.dashboard-cuidador');
                }
            } else {
                return redirect()
                    ->route('login')
                    ->with('login_error', 'E-mail ou Senha incorreta !');
            }
        } else {
            return redirect()->route('login');
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

                // 'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
                'foto' => 'image|mimes:jpg,jpeg,png',
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


                'foto.mimes' => 'A imagem deve ser do tipo: :values',
                // 'foto.max' => 'A imagem deve ter no maximo :max KB',
                'foto.image' => 'O arquivo deve ser uma imagem',
            ]
        );

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $extension = $request->foto->extension();

            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // path, name
            $request->foto->move(public_path('/assets/imgs/clientes/'), $image_name);
        }

        $endereco = Endereco::create([
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
        ]);

        Usuario::insert([
            'tipo_usuario' => $request->tipo_usuario,
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'foto' => $image_name ?? null,
            'endereco_id' => $endereco->id
        ]);



        return redirect()
            ->route('login')
            ->with('create_user_success', "Seu cadastro foi feito com Sucesso !");
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
                // 'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
                'foto' => 'image|mimes:jpg,jpeg,png',
                // 'curriculo' => 'file|mimes:pdf,docx|max:2048',
                'curriculo' => 'file|mimes:pdf,docx',
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

                'foto.mimes' => 'A imagem deve ser do tipo: :values',
                'foto.max' => 'A imagem deve ter no maximo :max KB',
                'foto.image' => 'O arquivo deve ser uma imagem',

                'curriculo.mimes' => 'O arquivo deve ser do tipo: :values',
                'curriculo.max' => 'O arquivo deve ter no maximo :max KB',
                'curriculo.file' => 'O arquivo deve ser um arquivo',
            ]
        );

        // salvar a foto
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $extension = $request->foto->extension();
            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->foto->move(public_path('assets/imgs/cuidadores/'), $image_name);
        }

        // salvar o curriculo pdf ou docx
        if ($request->hasFile('curriculo') && $request->file('curriculo')->isValid()) {
            $extension = $request->curriculo->extension();
            $curriculo_name = md5($request->curriculo->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->curriculo->move(public_path('assets/imgs/curriculos/'), $curriculo_name);
        }


        Usuario::insert([
            'tipo' => $request->tipo,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'password' => Hash::make($request->password),
            'foto' => $image_name ?? null,
            'curriculo' => $curriculo_name ?? null,
        ]);

        return redirect()
            ->route('login')
            ->with('create_user_success', "Seu cadastro foi feito com Sucesso !");
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');

    }

    // update
    public function update($id){

        $id = decrypt($id);

        $userUpdate = Usuario::find($id);

        if($userUpdate->tipo == 'cliente'){
            return view('Auth.cliente-update', compact('userUpdate'));
        } else {
            return view('Auth.cuidador-update', compact('userUpdate'));
        }
    }

    public function update_submit(Request $request)
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
                'password' => 'nullable|min:8|max:16|confirmed',
                'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
                'curriculo' => 'file|mimes:pdf,docx|max:2048',
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
                'password.min' => 'A senha deve ter no minimo :min caracteres',
                'password.max' => 'A senha deve ter no minimo :max caracteres',
                'password.confirmed' => 'A confirmação da senha não confere',

                'foto.mimes' => 'A imagem deve ser do tipo: :values',
                'foto.max' => 'A imagem deve ter no maximo :max KB',
                'foto.image' => 'O arquivo deve ser uma imagem',
                'curriculo.mimes' => 'O arquivo deve ser do tipo: :values',
                'curriculo.max' => 'O arquivo deve ter no maximo :max KB',
                'curriculo.file' => 'O arquivo deve ser um arquivo',
            ]
        );

        $user = Usuario::find($request->id);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $extension = $request->foto->extension();
            $image_name = md5($request->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            if($user->tipo == "cliente"){
                $request->foto->move(public_path('assets/imgs/clientes/'), $image_name);
            }else if($user->tipo == "cuidador"){
                $request->foto->move(public_path('assets/imgs/cuidadores/'), $image_name);
            }
        } else {
            $image_name = $user->foto;
        }

        if ($request->hasFile('curriculo') && $request->file('curriculo')->isValid()) {
            $extension = $request->curriculo->extension();
            $curriculo_name = md5($request->curriculo->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->curriculo->move(public_path('assets/imgs/curriculos/'), $curriculo_name);
        } else {
            $curriculo_name = $user->curriculo;
        }

        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
        $user->cpf = $request->cpf;
        $user->cidade = $request->cidade;
        $user->bairro = $request->bairro;
        $user->rua = $request->rua;
        $user->password = $password;
        $user->foto = $image_name;
        $user->curriculo = $curriculo_name;
        $user->save();

        if($user->tipo == "cuidador"){
            return redirect()
            ->route('dashboard.cuidador')
            ->with('update_cuidador_success', "Seus dados foram atualizados com sucesso !");
        }

        return redirect()
            ->route('dashboard.cliente')
            ->with('update_cliente_success', "Seus dados foram atualizados com sucesso !");


    }
}


