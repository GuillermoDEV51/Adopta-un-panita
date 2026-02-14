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
    /**
     * Muestra la página de inicio con mascotas recientes y refugios.
     */
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

    /**
     * Muestra las mascotas de un refugio específico.
     */
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

    /**
     * Muestra la vista de donativos.
     */
    public function donativos()
    {
        return view('Donativos');
    }

    /**
     * Muestra la misión de la organización.
     */
    public function mision()
    {
        return view('Mision');
    }

    /**
     * Muestra las preguntas frecuentes.
     */
    public function preguntasFrecuentes()
    {
        return view('PreguntasFrecuentes');
    }

    /**
     * Muestra el formulario de abandono.
     */
    public function formularioAbandono()
    {
        return view('FormularioDeAbandono');
    }

    /**
     * Publicar mascota (Redirección o manejo lógica si es necesario).
     */
    public function publicar(Request $request) {
        // Lógica pendiente o redirección
        return redirect()->route('vistavacia');
    }
}
