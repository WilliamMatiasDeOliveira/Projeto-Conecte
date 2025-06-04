@php
    if(Auth::user()){
        if(Auth::user()->tipo == "cliente"){
            return redirect()->route("dashboard.cliente");
        }

        return redirect()->route("dashboard.cuidador");
    }
@endphp



@extends('Layouts.main_layout')

@section('title', 'Cadastro')

@section('content')
    <div class="form-login-container">
        <section class="form-login">
            <h1>LOGIN</h1>
            <form action="{{ route('login.submit') }}" method="post">
                @csrf

                <div>
                    <label for="email">E-mail</label>
                    <input type="email"name="email" class="form-control"value="{{ old('email') }}">
                    @error('email')
                        <div class="text-warning">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="password">Senha</label>
                    <input type="password"name="password" class="form-control">
                    @error('password')
                        <div class="text-warning">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <input type="submit"class="btn btn-secondary form-control mt-4" value="LOGIN">
                </div>
            </form>
        </section>

    </div>

@endsection
