<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SolicitudAdopcion;

class SolicitudesAdminController extends Controller
{
    public function index()
    {
        $solicitudes = SolicitudAdopcion::with(['usuario', 'mascota'])->get();
        return view('admin.SolicitudesAdmin', compact('solicitudes'));
    }
}
