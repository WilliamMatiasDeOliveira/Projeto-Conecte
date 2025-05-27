@extends('Layouts.main_layout')
@section('title' . 'dashboard-cuidador')



@section('content')

    <section class="dashboard-cuidador-container">

        <div class="dashboard-cuidador">
            <div class="dashboard-cuidador img-user">
                <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="foto do usuario">
                <h1 class='dashboard-cuidador title-nome'>{{ Auth::user()->nome }}</h1>
            </div>

            <div class="dashboard-cuidador info-user">
                <p>E-MAIL : {{ Auth::user()->email }}</p>
                <p>TELEFONE : {{ Auth::user()->telefone }}</p>
                <p>CPF : {{ Auth::user()->cpf }}</p>
                <p>CIDADE : {{ Auth::user()->cidade }}</p>
                <p>BAIRRO : {{ Auth::user()->bairro }}</p>
                <p>RUA : {{ Auth::user()->rua }}</p>
                <p><iframe src="{{ asset('assets/imgs/curriculos/' . Auth::user()->curriculo) }}" width="100%"
                        height="600px"></iframe></p>
            </div>

            <a href="#" class="btn btn-danger form-control mt-4 mb-4">Atualizar Dados</a>


        </div>


    </section>

@endsection
