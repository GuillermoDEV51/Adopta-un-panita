<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SolicitudAdopcion;

class SolicitudesAdminController extends Controller
{
    public function index()
    {
        $solicitudes = SolicitudAdopcion::with(['usuario', 'mascota'])->orderBy('created_at', 'desc')->get();
        return view('admin.SolicitudesAdmin', compact('solicitudes'));
    }

    public function aprobar($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->estado = 'aprobada';
        $solicitud->save();
        
        // Opcional: Notificar al usuario (pendiente de implementación)

        return back()->with('success', 'Solicitud de adopción aprobada.');
    }

    public function rechazar($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->estado = 'rechazada';
        $solicitud->save();

        return back()->with('success', 'Solicitud de adopción rechazada.');
    }
}
