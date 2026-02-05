<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\Especie; 
use App\Http\Requests\MascotasRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class InicioController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::with('especie', 'usuario')
            ->latest()
            ->take(4)
            ->get();
        $refugios = Refugios::all();
        $especies = Especie::all(); 
        
        return view('inicio', compact('refugios', 'mascotas', 'especies'));
    }

}
