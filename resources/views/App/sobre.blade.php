@extends('Layouts.main_layout')

@section('title', 'Sobre')

@section('content')

    @include('Layouts.header')

    <section class="sobre">
        <div class="sobre-info">
            <h1>Quem somos nós?</h1>
            <p>No <strong>Conecte Cuidadores</strong>, acreditamos que todos merecem cuidado e atenção de qualidade.
                Nossa plataforma nasceu com um propósito simples: <strong>aproximar cuidadores experientes de pessoas
                    que precisam de assistência</strong>, de forma rápida, acessível e confiável.</p>

            <p><strong>Nossa Missão é clara:</strong> facilitar a conexão entre aqueles que precisam de apoio no dia a
                dia e profissionais dedicados ao bem-estar e à saúde. Queremos tornar essa busca mais <strong>simples,
                    rapida e humana</strong>.</p>
        </div>

        <div class="sobre-img">
            <div>
                <img src="{{ asset('assets/imgs/sobre1.jpg') }}" alt="Sobre 1">
            </div>
            <div>
                <img src="{{ asset('assets/imgs/sobre2.jpg') }}" alt="Sobre 2">
            </div>
        </div>
    </section>

    @include('Layouts.footer')

@endsection
