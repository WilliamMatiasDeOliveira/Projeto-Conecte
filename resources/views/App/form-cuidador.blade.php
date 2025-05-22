@extends('Layouts.main_layout')
@include('Layouts.header')

@section('title', 'Cadastro')

@section('content')
    <div class="form-cliente-container">
        <section class="form-cliente">
             <h1>Cadastre-se Gratuitamente ?</h1>
            <form action="#" method="post"enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nome">Nome</label>
                    <input type="text"name="nome" class="form-control">
                </div>

                <div>
                    <label for="email">E-mail</label>
                    <input type="email"name="email" class="form-control">
                </div>

                <div>
                    <label for="telefone">Telefone</label>
                    <input type="text"name="telefone" class="form-control">
                </div>

                <div>
                    <label for="cpf">Cpf</label>
                    <input type="text"name="cpf" class="form-control">
                </div>

                <div>
                    <label for="cidade">Cidade</label>
                    <input type="text"name="cidade" class="form-control">
                </div>

                <div>
                    <label for="bairro">Bairro</label>
                    <input type="text"name="bairro" class="form-control">
                </div>

                <div>
                    <label for="rua">Rua</label>
                    <input type="text"name="rua" class="form-control">
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

