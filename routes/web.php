<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/sobre', [AppController::class, 'sobre'])->name('sobre');
Route::get('/cadastro', [AppController::class, 'cadastro'])->name('cadastro');
Route::get('/contatos', [AppController::class, 'contatos'])->name('contatos');
Route::get('/form-cliente', [AppController::class, 'form_cliente'])->name('form.cliente');
Route::get('/form-cuidador', [AppController::class, 'form_cuidador'])->name('form.cuidador');
