<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Refugios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RefugiosRequest;

class RefugiosAdminController extends Controller
{
    public function index()
    {
        $refugios = Refugios::all();
        return view('admin.RefugiosAdmin', compact('refugios'));
    }

    public function show()
    {
        $refugios = Refugios::all();
        return view('admin.AñadirRefugio', compact('refugios'));
        
    }
    Public function editar($id)
    {
        $refugio = Refugios::findOrFail($id);
        return view('admin.RefugiosAdmin', compact('refugio'));
    }






    //Funciones para CRUD de refugios
    public function create()
    {
        return view('admin.AñadirRefugio');
    }

    public function store(RefugiosRequest $request)
    {
        Refugios::create($request->validated());

        return redirect()->route('RefugiosAdmin')->with('success', 'Refugio registrado exitosamente.');
    }

    /*
    * El metodo 'editar' ya existia en el codigo original pero con nombre inconsistente
    * o duplicado en terminos de funcionalidad con 'show' del original. 
    * Lo estamos ajustando para que sea coherente.
    */

    Public function update(RefugiosRequest $request, $id)
    {
        $refugio = Refugios::findOrFail($id);
        $refugio->update($request->validated());

        return redirect()->route('RefugiosAdmin')->with('success', 'Refugio actualizado correctamente.');
    }

    Public function eliminar($id)
    {
        $refugio = Refugios::findOrFail($id);
        $refugio->delete();

        return redirect()->route('RefugiosAdmin')->with('success', 'Refugio eliminado correctamente.');
    }
}
