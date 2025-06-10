<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->tipo == "cliente") {
                return redirect()->route("dashboard.cliente");
            }

            return redirect()->route("dashboard.cuidador");
        }

        return view('App.login');
    }

    public function home()
    {
        return view('App.home');
    }

    public function sobre_nos()
    {
        return view('App.sobre-nos');
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
        if (Auth::check()) {
            if (Auth::user()->tipo == "cliente") {
                return redirect()->route("dashboard.cliente");
            }

            return redirect()->route("dashboard.cuidador");
        }

        return view('App.form-cliente');
    }

    public function form_cuidador()
    {
        if (Auth::check()) {
            if (Auth::user()->tipo == "cliente") {
                return redirect()->route("dashboard.cliente");
            }

            return redirect()->route("dashboard.cuidador");
        }

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
