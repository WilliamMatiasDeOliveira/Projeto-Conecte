<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/sobre', [AppController::class, 'sobre'])->name('sobre');
Route::get('/cadastro', [AppController::class, 'cadastro'])->name('cadastro');
Route::get('/contatos', [AppController::class, 'contatos'])->name('contatos');
Route::get('/form-cliente', [AppController::class, 'form_cliente'])->name('form.cliente');
Route::get('/form-cuidador', [AppController::class, 'form_cuidador'])->name('form.cuidador');
Route::get('/login', [AppController::class, 'login'])->name('login');


Route::post('/form-cliente-submit', [AuthController::class, 'form_cliente_submit'])->name('form.cliente.submit');
Route::post('login-submit', [AuthController::class, 'login_submit'])->name('login.submit');
