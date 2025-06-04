@extends('Layouts.main_layout')
@section('title' . 'dashboard-cuidador')

@section('content')

    <section class="dashboard-cuidador-container">

        <div class="dashboard-cuidador">

            <div class="dasboard-cuidador box-dados">
                <div class="img-user">
                    <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="foto do usuario">
                    <h1 class='dashboard-cuidador title-nome'>{{ Auth::user()->nome }}</h1>
                </div>

                <div class="dashboard-cuidador dados">
                    <p>E-MAIL : {{ Auth::user()->email }}</p><br>
                    <p>TELEFONE : {{ Auth::user()->telefone }}</p><br>
                    <p>CPF : {{ Auth::user()->cpf }}</p><br>
                    <p>CIDADE : {{ Auth::user()->cidade }}</p><br>
                    <p>BAIRRO : {{ Auth::user()->bairro }}</p><br>
                    <p>RUA : {{ Auth::user()->rua }}</p><br>
                </div>
            </div>

            <div class="dashboard-cuidador show-data">
                <p><iframe src="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}"></iframe></p>

                <a href="{{ route('update', encrypt(Auth::user()->id)) }}" class="btn btn-danger">Atualizar
                    Dados</a>
            </div>


        </div>


    </section>

@endsection
