<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/sobre', [AppController::class, 'sobre'])->name('sobre');
Route::get('/cadastro', [AppController::class, 'cadastro'])->name('cadastro');
Route::get('/contatos', [AppController::class, 'contatos'])->name('contatos');
