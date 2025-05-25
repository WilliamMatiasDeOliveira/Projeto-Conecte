@extends('Layouts.main_layout')
@section('title', 'Dashboard Cliente')

@section('content')

    @include('Layouts.header')

    <div class="container">
        <h1>Dashboard Cliente</h1>
        <p>Bem-vindo ao seu painel de controle!</p>
        <p>Aqui você pode gerenciar suas informações e acessar nossos serviços.</p>

        <div class="card dashboard-cliente-card">
            <div class="card-header">
                <h2>Informações do Cliente</h2>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Telefone:</strong> {{ Auth::user()->telefone }}</p>
            </div>
        </div>

        <h1>Serviços Disponiveis</h1>

        <section class="dashboard-cliente-servicos-container">
            @foreach ($cuidadores as $cuidador)
                <div class="card">
                    <img src="{{ asset('assets/imgs/cuidadores/' . $cuidador->foto) }}" class="card-img-top"
                        alt="Foto do Cuidador">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cuidador->nome }}</h5>
                        <p class="card-text">{{ $cuidador->telefone }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </section>

    </div>

    @include('Layouts.footer')

@endsection
