<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\SolicitudAdopcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefugioDashboardController extends Controller
{
    /**
     * Display the shelter dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Find the shelter associated with this user
        $refugio = Refugios::where('user_id', $user->id)->first();

        if (! $refugio) {
            // Check if user has role 'Refugio' but no profile yet?
            // Or maybe redirect to create profile page.
            // For now, assume it might not exist and return view with null
            // or redirect to a 'create profile' form.
            return redirect()->route('refugio.createProfile');
        }

        // Get pets belonging to this shelter (or user)
        // Linking by id_refugio is cleaner if we strictly use that for shelter pets
        $mascotas = Mascotas::where('id_refugio', $refugio->id)
            ->orWhere('id_usuario', $user->id) // Fallback if linked by user
            ->get();

        // Get Adoption Requests for these pets
        // Filtering: Only requests from VERIFIED users (as per requirements)
        // We need requests where the mascota belongs to this shelter
        $mascotaIds = $mascotas->pluck('id');

        $solicitudes = SolicitudAdopcion::with(['user', 'mascota'])
            ->whereIn('mascota_id', $mascotaIds)
            ->whereHas('user', function ($q) {
                $q->where('estado_verificacion', 'verificado');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('refugio.dashboard', compact('refugio', 'mascotas', 'solicitudes'));
    }

    /**
     * Show form to create/edit shelter profile.
     */
    public function createProfile()
    {
        $user = Auth::user();
        $refugio = Refugios::where('user_id', $user->id)->first();

        return view('refugio.profile', compact('refugio'));
    }

    /**
     * Store or Update shelter profile.
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
