@extends('Layouts.main_layout')
@section('title', 'Dashboard Cliente')



@section('content')
    @include('Layouts.header')

    <style>
        .dashboard-cuidador-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0rem 1rem;
        }

        .dashboard-cuidador .img-user {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .dashboard-cuidador .img-user img {
            width: 220px;
            height: 200px;
            border-radius: 50%;
            margin-top: 2rem
        }

        .dashboard-cuidador .img-user h1 {
            font-size: 40px;
        }

        .dashboard-cuidador .info-user {
            text-align: center;
            font-weight: 600;
        }

        .dashboard-cuidador .info-user iframe {
            width: 800px;
        }

        /* --------------------------------------------- */

        .lista-cuidadores-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .lista-cuidadores .card-body {
            background-color: var(--azul-escuro);
            padding: 1rem;
            border: 1px solid var(--azul-escuro);
        }
    </style>

    <section class="dashboard-cuidador-container">

        <div class="dashboard-cuidador">
            <div class="dashboard-cuidador img-user">
                <img src="{{ asset('assets/imgs/clientes/' . Auth::user()->foto) }}" alt="foto do usuario">
                <h1 class='dashboard-cuidador title-nome'>{{ Auth::user()->nome }}</h1>
            </div>

            <div class="dashboard-cuidador info-user">
                <p>E-MAIL : {{ Auth::user()->email }}</p>
                <p>TELEFONE : {{ Auth::user()->telefone }}</p>
                <p>CPF : {{ Auth::user()->cpf }}</p>
                <p>CIDADE : {{ Auth::user()->cidade }}</p>
                <p>BAIRRO : {{ Auth::user()->bairro }}</p>
                <p>RUA : {{ Auth::user()->rua }}</p>
                 <a href="#" class="btn btn-danger mt-4 mb-4">Atualizar Dados</a>
            </div>

            <h1 class="text-center">Contrate um de nossos cuidadores</h1>
            <section class="lista-cuidadores-container">
                @foreach ($cuidadores as $cuidador)
                    <div class="lista-cuidadores" style="width: 25rem;">
                        <img src="{{ asset('assets/imgs/cuidadores/' . $cuidador->foto) }}"alt="imagem do cuidador">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $cuidador->nome }}</h5>
                            <p class="card-text">E-MAIL: {{ $cuidador->email }}
                                <br>TELEFONE: {{ $cuidador->telefone }}
                                <br>CIDADE: {{ $cuidador->cidade }}
                            </p>

                            <a href="#" class="btn btn-primary">Go somewhere</a>

                        </div>
                    </div>
                @endforeach
            </section>


        </div>


    </section>

    @include('Layouts.footer')
@endsection
