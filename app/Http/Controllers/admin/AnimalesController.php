<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MascotasRequest;
use App\Models\Mascotas;
use App\Models\Especie;

class AnimalesController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::all();
        $especies = Especie::all();
        return view('admin.AnimalesAdmin' , compact('mascotas', 'especies'));
    }

   

    public function eliminar($id)
    {
        // Lógica para eliminar un animal
    }   

    public function editar($id)
    {
        $mascota = Mascotas::findOrFail($id);
        $especies = Especie::all();
        return view('admin.EditarAnimal', compact('mascota', 'especies'));
    }


    public function update(MascotasRequest $request, $id)
    {
       $mascota = Mascotas::findOrFail($id);

       $mascota->update($request->validated());


       return view('admin.AnimalesAdmin');
    }
}
