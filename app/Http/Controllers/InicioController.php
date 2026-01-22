<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Http\Requests\MascotasRequest;


class InicioController extends Controller
{
    public function show(){

        $mascotas = Mascotas::all();

        return view('inicio');
    }

    public function publicar(MascotasRequest $request) {
        
        $data = $request->validated();

        // Manejar la carga de la foto si existe
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos_mascotas');
            $data['foto'] = basename($path);
        }

        Mascotas::create($data);
       

        return redirect('vistavacia')->withErrors([]);


    }

    
    public function index(){
        $especies = \App\Models\Especie::all();
        return view('vistavacia', compact('especies'));
    }
}
