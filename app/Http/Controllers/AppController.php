<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function login()
    {
        return view('App.login');
    }

    public function home()
    {
        return view('App.home');
    }

    public function sobre()
    {
        return view('App.sobre');
    }

    public function cadastro()
    {
        return view('App.cadastro');
    }

    public function contatos()
    {
        return view('App.contatos');
    }

    public function form_cliente()
    {
        return view('App.form-cliente');
    }

    public function form_cuidador()
    {
        return view('App.form-cuidador');
    }

    public function dashboard_cliente()
    {
        return view('Auth.dashboard-cliente');
    }
    public function dashboard_cuidador()
    {
        return view('Auth.dashboard-cuidador');
    }
}
