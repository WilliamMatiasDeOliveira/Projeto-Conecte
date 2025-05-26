@extends('Layouts.main_layout')
@include('Layouts.header')

@section('title', 'Cadastro')

@section('content')
    <div class="form-cliente-container">
        <section class="form-cliente">

             <h1>Cadastre-se Gratuitamente ?</h1>
            <form action="{{ route('form.cuidador.submit') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden"name="tipo"value="cuidador">

                <div class="form-cliente-pessoal">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text"name="nome" class="form-control"value="{{ old('nome') }}">
                        @error('nome')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="cpf">Cpf</label>
                        <input type="text"name="cpf" class="form-control"value="{{ old('cpf') }}">
                        @error('cpf')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email"name="email" class="form-control"value="{{ old('email') }}">
                        @error('email')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="telefone">Telefone</label>
                        <input type="text"name="telefone" class="form-control"value="{{ old('telefone') }}">
                        @error('telefone')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="cliente-form-endereco">
                    <div>
                        <label for="cidade">Cidade</label>
                        <input type="text"name="cidade" class="form-control"value="{{ old('cidade') }}">
                        @error('cidade')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div>
                        <label for="bairro">Bairro</label>
                        <input type="text"name="bairro" class="form-control"value="{{ old('bairro') }}">
                        @error('bairro')
                            <div class="text-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div>
                        <label for="rua">Rua</label>
                        <input type="text"name="rua" class="form-control"value="{{ old('rua') }}">
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

                <div>
                    <label for="foto">Foto</label>
                    <input type="file"name="foto" class="form-control">
                </div>

                <div>
                    <label for="curriculo">Curriculo</label>
                    <input type="file"name="curriculo" class="form-control">
                </div>

                <div>
                    <input type="submit"class="btn btn-secondary form-control mt-4" value="Cadastrar-se">
                </div>
            </form>
        </section>

    </div>

    @include('Layouts.footer')

@endsection
