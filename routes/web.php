<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AppController::class)->group(function() {

    Route::get('/', 'home')->name('home')
        ->middleware(['guest', 'auth']);

    Route::get('/sobre', 'sobre')->name('sobre')
        ->middleware(['guest', 'auth']);

    Route::get('/cadastro', 'cadastro')->name('cadastro')
        ->middleware(['guest']);

    Route::get('/contatos', 'contatos')->name('contatos')
        ->middleware(['guest', 'auth']);

    Route::get('/form-cliente', 'form_cliente')->name('form.cliente')
        ->middleware(['guest']);

    Route::get('/form-cuidador', 'form_cuidador')->name('form.cuidador')
        ->middleware(['guest']);

    Route::get('/login', 'login')->name('login')
        ->middleware(['guest']);

    Route::get('/dashboard-cliente', 'dashboard_cliente')->name('dashboard.cliente')
        ->middleware(['auth']);

    Route::get('/dashboard-cuidador', 'dashboard_cuidador')->name('dashboard.cuidador')
        ->middleware(['auth']);
});

Route::controller(AuthController::class)->group(function() {

    Route::post('/form-cuidador-submit', 'form_cuidador_submit')->name('form.cuidador.submit')
        ->middleware(['guest']);

    Route::post('/form-cliente-submit', 'form_cliente_submit')->name('form.cliente.submit')
        ->middleware(['guest']);

    Route::post('/login-submit', 'login_submit')->name('login.submit')
        ->middleware(['guest']);
    
    Route::post('/logout', 'logout')->name('logout')
        ->middleware(['auth']);
});
