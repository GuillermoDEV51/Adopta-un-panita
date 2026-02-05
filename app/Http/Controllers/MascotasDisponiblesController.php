<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Http\Requests\MascotasRequest;
use App\Models\Especie;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;


class MascotasDisponiblesController extends Controller
{

    //cargar vista con las mascotas 
    public function show()
    {
        $mascotas = Mascotas::with('especie', 'usuario')->get();
        $especies = Especie::all();
        $usuarios = Usuarios::all();
        
        return view('MascotasDisponibles', compact('mascotas', 'especies', 'usuarios'));
    }



   
    //// filtro por especies///
    public function filterBySpecies($speciesId)
    {
        $mascotas = Mascotas::where('especie_id', $speciesId)->with('especie')->get();
        
        return view('MascotasDisponibles', compact('mascotas'));
    }


public function publicar2(MascotasRequest $request) {
        
    if (!Auth::check()) {
        return back()->withErrors(['error' => 'Debes iniciar sesión para publicar.']);
    }
   
    $data = $request->validated();
   $data['id_usuario'] = Auth::id();

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('mascotas', 'public');
        $data['foto'] = basename($path);
    }

    if ($request->hasFile('documentacion')) {
        $files = [];
        foreach ($request->file('documentacion') as $file) {
            $files[] = basename($file->store('documentacion', 'public'));
        }
        $data['documentacion'] = json_encode($files); // O implode(',', $files)
    }
    
    unset($data['telefono']);  // Error en imagen
    unset($data['ubicacion']);  // Eliminar campos no necesarios
    Mascotas::create($data);

    // 🔹 Redirigir a la lista de mascotas disponibles
    return redirect()->route('MascotasDisponibles')
                     ->with('success', 'Mascota publicada exitosamente!');
}

       

       




    







////// prueba1 //////

   public function prueba1()
    {
        $especies = \App\Models\Especie::all();
        return view('prueba1', compact('especies'));
    }

    public function vistavacia()
    {
        $especies = Especie::all();
        return view('vistavacia', compact('especies'));
    }   

}
