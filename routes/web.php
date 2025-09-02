<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\checkAuthMiddleware;
use App\Http\Middleware\checkGuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AppController::class)->group(function () {
    Route::get('/dashboard-cliente', 'dashboard_cliente')->name('dashboard.cliente');

    Route::get('/dashboard-cuidador', 'dashboard_cuidador')->name('dashboard.cuidador');

    Route::get('/login', 'login')->name('login');

    Route::get('/', 'home')->name('home');

    Route::get('/sobre-nos', 'sobre_nos')->name('sobre.nos');

    Route::get('/cadastro', 'cadastro')->name('cadastro');

    Route::get('/contatos', 'contatos')->name('contatos');

    Route::get('/form-cliente', 'form_cliente')->name('form.cliente');

    Route::get('/form-cuidador', 'form_cuidador')->name('form.cuidador');

    Route::post('/envio-email', 'envio_email')->name('envio.email');
});

Route::controller(AuthController::class)->group(function () {
        Route::post('/form-cuidador-submit', 'form_cuidador_submit')->name('form.cuidador.submit');

        Route::post('/form-cliente-submit', 'form_cliente_submit')->name('form.cliente.submit');

        Route::post('/login-submit', 'login_submit')->name('login.submit');

        Route::post('/logout', 'logout')->name('logout');

        Route::get('/update/{id}', 'update')->name('update');

        Route::post('/update-submit', 'update_submit')->name('update.submit');
});
