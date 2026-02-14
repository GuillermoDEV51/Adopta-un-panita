<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\SolicitudAdopcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefugioDashboardController extends Controller
{
    /**
     * Muestra el panel de control del refugio.
     */
    public function index()
    {
        $user = Auth::user();

        // Buscar el refugio asociado con este usuario
        $refugio = Refugios::where('user_id', $user->id)->first();

        if (! $refugio) {
            // ¿Comprobar si el usuario tiene rol 'Refugio' pero aún no tiene perfil?
            // O tal vez redirigir a la página de creación de perfil.
            // Por ahora, asumir que podría no existir y devolver la vista con null
            // o redirigir a un formulario de 'crear perfil'.
            return redirect()->route('refugio.createProfile');
        }

        // Obtener mascotas pertenecientes a este refugio (o usuario)
        // Vincular por id_refugio es más limpio si usamos eso estrictamente para mascotas de refugio
        $mascotas = Mascotas::where('id_refugio', $refugio->id)
            ->orWhere('id_usuario', $user->id) // Respaldo si está vinculado por usuario
            ->get();

        // Obtener Solicitudes de Adopción para estas mascotas
        // Filtrado: Solo solicitudes de usuarios VERIFICADOS (según requisitos)
        // Necesitamos solicitudes donde la mascota pertenezca a este refugio
        $mascotaIds = $mascotas->pluck('id');

        $solicitudes = SolicitudAdopcion::with(['usuario', 'mascota'])
            ->whereIn('mascota_id', $mascotaIds)
            ->whereHas('usuario', function ($q) {
                $q->where('estado_verificacion', 'verificado');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $especies = Especie::all();

        return view('refugio.dashboard', compact('refugio', 'mascotas', 'solicitudes', 'especies'));
    }

    /**
     * Muestra el formulario para crear/editar el perfil del refugio.
     */
    public function createProfile()
    {
        $user = Auth::user();
        $refugio = Refugios::where('user_id', $user->id)->first();

        return view('refugio.profile', compact('refugio'));
    }

    /**
     * Almacena o actualiza el perfil del refugio.
     */
    public function storeProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $refugio = Refugios::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->route('refugio.dashboard')->with('success', 'Perfil de refugio actualizado.');
    }
}
