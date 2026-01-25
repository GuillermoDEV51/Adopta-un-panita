<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Http\Requests\MascotasRequest;

class MascotasDisponiblesController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::with('especie')->get();
        
        return view('MascotasDisponibles', compact('mascotas'));
    }

    public function filterBySpecies($speciesId)
    {
        $mascotas = Mascotas::where('especie_id', $speciesId)->with('especie')->get();
        
        return view('MascotasDisponibles', compact('mascotas'));
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

    public function index(){
        $especies = \App\Models\Especie::all();
        return view('MascotasDisponibles', compact('especies'));
    }
}
