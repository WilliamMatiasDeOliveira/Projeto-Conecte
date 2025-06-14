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

                @if (!isset(Auth::user()->foto))
                    <svg xmlns="http://www.w3.org/2000/svg" width="300" height="200" fill="currentColor"
                        class="bi bi-person-square mx-auto mt-1" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                    </svg>
                @else
                    <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="foto do usuario">
                @endif

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
