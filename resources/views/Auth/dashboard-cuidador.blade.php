@php
    $user = Auth::guard('cuidador')->user();
@endphp

@extends('Layouts.main_layout')
@section('title', 'dashboard-cuidador')

@include('Layouts.header')

<section class="dashboard-cuidador-container">
    <div class="card" style="width: 30rem;">
        <img src="{{ asset('assets/imgs/cuidadores/' . $user->foto) }}" class="card-img-top"
            alt="Foto do Cuidador">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $user->nome }}</h5>
            <ul>
                <li>E-mail : {{ $user->email }}</li>
                <li>Telefone : {{ $user->telefone }}</li>
                <li>CPF : {{ $user->cpf }}</li>
                <li>Cidade : {{ $user->cidade }}</li>
                <li>Bairro : {{ $user->bairro }}</li>
                <li>Rua : {{ $user->rua }}</li>
            </ul>
            <a href="#" class="btn btn-primary">Atualizar meus Dados</a>
        </div>
    </div>
</section>

@include('Layouts.footer')
