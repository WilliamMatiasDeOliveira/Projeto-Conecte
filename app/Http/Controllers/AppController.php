<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(){
        return view('App.home');
    }

    public function sobre(){
        return view('App.sobre');
    }

    public function cadastro(){
        return view('App.cadastro');
    }
}
