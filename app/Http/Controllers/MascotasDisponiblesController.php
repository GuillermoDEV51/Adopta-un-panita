<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;

class MascotasDisponiblesController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::all();
        
        return view('MascotasDisponibles', compact('mascotas'));
    }
}
