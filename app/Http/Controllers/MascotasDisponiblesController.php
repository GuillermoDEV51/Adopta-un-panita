<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Http\Requests\MascotasRequest;
use App\Models\Especie;
use Illuminate\Support\Facades\Auth;


class MascotasDisponiblesController extends Controller
{

    //cargar vista con las mascotas 
    public function show()
    {
        $mascotas = Mascotas::with('especie')->get();
        $especies = Especie::all();
        
        return view('MascotasDisponibles', compact('mascotas', 'especies'));
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

            $data['id_usuario'] = Auth::user()->id;

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('mascotas', 'public');
                 $data['foto'] = basename($path);
            }

             if ($request->hasfile('documentacion')) {
            $documents = $request->file('documentacion')->store('documentacion', 'public');
            $data['documentacion'] = basename($documents);
             }

     Mascotas::create($data);


      // Redirigir con mensaje de éxito
        return redirect()->route('vistavacia')->with('success', 'Mascota publicada exitosamente!');
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
