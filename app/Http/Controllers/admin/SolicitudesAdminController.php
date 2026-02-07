<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SolicitudAdopcion;

class SolicitudesAdminController extends Controller
{
    public function index()
    {
        // Admin manages User Verification Requests (Capacidad de adoptar)
        // We fetch users with 'pending' verification status
        $solicitudes = \App\Models\Usuarios::where('estado_verificacion', 'pendiente')
                                         ->orderBy('updated_at', 'desc') // or created_at
                                         ->get();
                                         
        // Note: For approval/rejections we will use the existing routes in UsuariosAdminController
        // accessible via the dashboard view.
        
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
