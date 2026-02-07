<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\SolicitudAdopcion;
use App\Models\Usuarios;

class DashboardController extends Controller
{
    public function show()
    {
        $totalMascotas = Mascotas::count();
        $totalUsuarios = Usuarios::count();
        $totalRefugios = Refugios::count();
        $totalSolicitudes = SolicitudAdopcion::count();

        return view('admin.Dashboard', compact('totalMascotas', 'totalUsuarios', 'totalRefugios', 'totalSolicitudes'));
    }
}
