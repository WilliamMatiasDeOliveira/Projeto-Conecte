<?php

namespace App\Http\Controllers;

use App\Models\Cuidador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function home()
    {
        return view('App.home');
    }

    public function login()
    {
        return view('App.login');
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
        if (Auth::check()) {
            $papel = Auth::user()->papel;

            if ($papel === 'cliente') {
                return redirect()->route('dashboard.cliente');
            } elseif ($papel === 'cuidador') {
                return redirect()->route('dashboard.cuidador');
            }
        }

        return view('App.form-cliente');
    }

    public function form_cuidador()
    {
        if (Auth::check()) {
            $papel = Auth::user()->papel;

            if ($papel === 'cliente') {
                return redirect()->route('dashboard.cliente');
            } elseif ($papel === 'cuidador') {
                return redirect()->route('dashboard.cuidador');
            }
        }

        return view('App.form-cuidador');
    }

    public function dashboard_cliente()
    {
        $cuidadores = Cuidador::all();
        return view('Auth.dashboard-cliente', compact('cuidadores'));
    }
    public function dashboard_cuidador()
    {
        return view('Auth.dashboard-cuidador');
    }
}
