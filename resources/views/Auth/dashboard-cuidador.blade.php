@extends('Layouts.main_layout')
@section('title' . 'dashboard-cuidador')

@section('content')

    <section class="dashboard-cuidador-container">

        <div class="dashboard-cuidador">

            <div class="box-dados">
                <div class="img-user">
                    <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="foto do usuario">
                    <h1 class='title-nome'>{{ Auth::user()->nome }}</h1>
                </div>

                <div class="dados">
                    <ul>
                        <li>E-MAIL : {{ Auth::user()->email }}</li>
                        <li>TELEFONE : {{ Auth::user()->telefone }}</li>
                        <li>CPF : {{ Auth::user()->cpf }}</li>
                        <li>CIDADE : {{ Auth::user()->cidade }}</li>
                        <li>BAIRRO : {{ Auth::user()->bairro }}</li>
                        <li>RUA : {{ Auth::user()->rua }}</li>
                    </ul>
                    <a href="{{ route('update', encrypt(Auth::user()->id)) }}" class="btn btn-success form-control">Atualizar
                        Dados</a>
                </div>
            </div>

            <div class="show-data">
                <iframe src="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}"></iframe>
            </div>

            <div class="show-data-mobile">
                <a href="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}"
                    download
                    rel="noopener noreferrer"
                    class="btn btn-secondary mt-2 form-control">
                    Ver Currículo
                </a>
            </div>


        </div>


    </section>

@endsection
