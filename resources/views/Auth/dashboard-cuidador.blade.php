@extends('Layouts.main_layout')
@section('title' . 'dashboard-cuidador')

@section('content')

    <section class="dashboard-cuidador-container">

        @if (session('update_cuidador_success'))
            <div class="alert alert-success"id="update_cuidador_success">
                {{ session('update_cuidador_success') }}
            </div>
        @endif

        <div class="dashboard-cuidador">

            <div class="card">
                <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="foto do usuario">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->nome }}</h5>
                    <p class="card-text">
                        <ul>
                            <li>E-MAIL : {{ Auth::user()->email }}</li>
                            <li>TELEFONE : {{ Auth::user()->telefone }}</li>
                            <li>CPF : {{ Auth::user()->cpf }}</li>
                            <li>CIDADE : {{ Auth::user()->cidade }}</li>
                            <li>BAIRRO : {{ Auth::user()->bairro }}</li>
                            <li>RUA : {{ Auth::user()->rua }}</li>
                        </ul>
                    </p>
                    <a href="{{ route('update', encrypt(Auth::user()->id)) }}" class="btn btn-primary w-100">Atualizar
                    Dados</a>
                </div>
            </div>

            <div class="show-data">
                <iframe src="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}"></iframe>
            </div>

            <div class="show-data-mobile">
                <a href="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}" download
                    rel="noopener noreferrer" class="btn btn-secondary mt-2 form-control">
                    Ver Currículo
                </a>
            </div>


        </div>


    </section>

@endsection
