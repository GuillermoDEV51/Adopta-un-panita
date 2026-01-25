<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Http\Requests\MascotasRequest;


class InicioController extends Controller
{
    public function show(){

        $mascotas = Mascotas::all();
        $refugios = Refugios::all();
        return view('inicio', compact( 'refugios'));
    }



    

    public function publicar(MascotasRequest $request) {
        
        $data = $request->validated();

        // Manejar la carga de la foto si existe
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('mascotas', 'public');
            $data['foto'] = basename($path);
        }

        Mascotas::create($data);
       

        return redirect('inicio')->withErrors([]);
    }
}
