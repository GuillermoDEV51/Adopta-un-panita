<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\Especie; 
use App\Models\Usuarios;
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

    public function refugioMascotas($id)
    {
        $refugio = Refugios::findOrFail($id);

        $mascotas = Mascotas::with('especie', 'usuario')
            ->where('id_refugio', $refugio->id)
            ->orWhere('id_usuario', $refugio->user_id)
            ->get();

        $especies = Especie::all();
        $usuarios = Usuarios::all();

        return view('MascotasDisponibles', compact('mascotas', 'especies', 'usuarios', 'refugio'));
    }

}
