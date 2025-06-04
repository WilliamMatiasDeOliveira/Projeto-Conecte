@extends('Layouts.main_layout')

@section('title', 'Cadastro')

@section('content')
    <div class="form-cliente-container">
        <section class="form-cliente">

            <div class="form-cliente-side">
                <h1>Cadastre-se Gratuitamente!</h1>
                <p>Preencha os campos abaixo para criar sua conta como cuidador.</p>
                <p>Ja possui uma conta? <a href="{{ route('login') }}">Entre aqui!</a></p>
                <img src="{{ asset('assets/imgs/cadastro.png') }}" alt="Imagem de fundo">
            </div>

            <form action="{{ route('update.submit') }}" method="post"enctype="multipart/form-data">
                @csrf

                <input type="hidden"name="id" value="{{ $userUpdate->id }}">

                <div class="form-cliente-pessoal">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text"name="nome" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->nome;
                            } else {
                                echo old('nome');
                            } @endphp">
                        @error('nome')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="cpf">Cpf</label>
                        <input type="text"name="cpf" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->cpf;
                            } else {
                                echo old('cpf');
                            } @endphp">
                        @error('cpf')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email"name="email" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->email;
                            } else {
                                echo old('email');
                            } @endphp">
                        @error('email')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="telefone">Telefone</label>
                        <input type="text"name="telefone" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->telefone;
                            } else {
                                echo old('telefone');
                            } @endphp">
                        @error('telefone')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-cliente-endereco">
                    <div>
                        <label for="cidade">Cidade</label>
                        <input type="text"name="cidade" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->cidade;
                            } else {
                                echo old('cidade');
                            } @endphp">
                        @error('cidade')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="bairro">Bairro</label>
                        <input type="text"name="bairro" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->bairro;
                            } else {
                                echo old('bairro');
                            } @endphp">
                        @error('bairro')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="rua">Rua</label>
                        <input type="text"name="rua" class="form-control"
                            value="@php
                            if (isset($userUpdate)) {
                                echo $userUpdate->rua;
                            } else {
                                echo old('rua');
                            } @endphp">
                        @error('rua')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-cliente-senha">
                    <div>
                        <label for="password">Senha</label>
                        <input type="password"name="password" class="form-control">
                        @error('password')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password"name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-cliente-fim">
                    {{-- Campo de Foto --}}
                    <div>
                        <label for="foto">Foto Atual</label><br>
                        @if ($userUpdate->foto)
                            <img src="{{ asset('assets/imgs/cuidadores/' . $userUpdate->foto) }}" alt="Foto do usuário"
                                style="width: 120px; height: 120px;margin-bottom: 10px;">
                        @else
                            <p>Sem foto cadastrada.</p>
                        @endif


                        <input type="file" name="foto" class="form-control">
                    </div>

                    {{-- campo curriculo --}}
                    <div>
                        <label for="curriculo">Currículo Atual</label><br>
                        @if ($userUpdate->curriculo)
                            <a href="{{ asset('assets/imgs/curriculos/' . $userUpdate->curriculo) }}"
                                target="_blank"style="color:black">Ver Currículo</a>
                        @else
                            <p>Sem currículo cadastrado.</p>
                        @endif


                        <input type="file" name="curriculo" class="form-control">
                    </div>

                    {{-- Botão de envio --}}
                    <div class="mt-4">
                        <input type="submit" class="btn btn-secondary form-control" value="Atualizar">
                    </div>
                </div>

            </form>
        </section>

    </div>

@endsection
