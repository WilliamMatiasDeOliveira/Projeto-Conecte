@extends('Layouts.main_layout')
@section('title', 'Home')

@include('Layouts.header')

@section('content')



    <div class="hero">

        <div class="hero-intro">
            <h1>
                Conectamos quem cuida a quem precisa. <strong>Simples, rápido e humano.</strong>
            </h1>
            <p>
                Encontre o cuidador ideal para suas necessidades ou ofereça seus serviços de cuidado de forma fácil
                e segura. Nossa plataforma simplifica a busca e a conexão, priorizando o cuidado humanizado e a
                confiança entre as partes.
            </p>
            <a href="#"class="btn btn-success">Quero saber mais</a>
        </div>
        <div class="hero-img">
            <img src="{{ asset('assets/imgs/hero4.png') }}" alt="Imagem de fundo">
        </div>
    </div>
    </section>

    @include('Layouts.footer')

@endsection
