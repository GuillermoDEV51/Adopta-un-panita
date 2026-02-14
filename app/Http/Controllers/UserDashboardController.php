<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAdopcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Muestra las solicitudes de adopción recibidas por el usuario (para mascotas que publicaron).
     */
    public function solicitudes()
    {
        $userID = Auth::id();

        // Obtener solicitudes donde la mascota pertenece al usuario autenticado
        $solicitudes = SolicitudAdopcion::with(['usuario', 'mascota'])
            ->whereHas('mascota', function ($query) use ($userID) {
                $query->where('id_usuario', $userID);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.solicitudes', compact('solicitudes'));
    }
}
