<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SolicitudAdopcion;
use App\Models\Usuarios;

class SolicitudesAdminController extends Controller
{
    public function index()
    {
        // El administrador gestiona las solicitudes de verificación de usuario (Capacidad de adoptar)
        // Obtenemos usuarios con estado de verificación 'pendiente'
        $solicitudes = Usuarios::where('estado_verificacion', 'pendiente')
            ->orderBy('updated_at', 'desc') // o created_at
            ->get();

        // Nota: Para aprobaciones/rechazos usaremos las rutas existentes en UsuariosAdminController
        // accesibles a través de la vista del panel.

        return view('admin.SolicitudesAdmin', compact('solicitudes'));
    }

    public function aprobar($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->estado = 'aprobada';
        $solicitud->save();

        if ($solicitud->mascota) {
            $solicitud->mascota->estado = 'adoptado';
            $solicitud->mascota->save();
        }

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
