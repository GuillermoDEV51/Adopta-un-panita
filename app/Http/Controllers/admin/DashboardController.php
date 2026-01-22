<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Usuarios;

class DashboardController extends Controller
{
    public function show()
    {
        $totalMascotas = Mascotas::count();
        $totalUsuarios = Usuarios::count();

        return view('admin.Dashboard', compact('totalMascotas', 'totalUsuarios'));
    }

    
}
