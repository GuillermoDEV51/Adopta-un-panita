<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Http\Requests\MascotasRequest;

class MascotasDisponiblesController extends Controller
{

    //cargar vista con las mascotas 
    public function show()
    {
        $mascotas = Mascotas::with('especie')->get();
        
        return view('MascotasDisponibles', compact('mascotas'));
    }



   
    //// filtro por especies///
    public function filterBySpecies($speciesId)
    {
        $mascotas = Mascotas::where('especie_id', $speciesId)->with('especie')->get();
        
        return view('MascotasDisponibles', compact('mascotas'));
    }

<<<<<<< Updated upstream

     //public function publicar(MascotasRequest $request) {
=======
    //publicar una mascota//
     public function publicar(MascotasRequest $request) {
>>>>>>> Stashed changes
        
       // $data = $request->validated();

        // Manejar la carga de la foto si existe
<<<<<<< Updated upstream
       // if ($request->hasFile('foto')) {
           // $path = $request->file('foto')->store('mascotas', 'public');
           // $data['foto'] = basename($path);
       // }
=======
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('mascotas', 'public');
            $data['foto'] = basename($path);
        }
        
        if($request->hasFile('documento')){
            $path = $request->file('documento')->store('doc', 'public');
            $data['documento'] = basename($path);
        }
>>>>>>> Stashed changes

        //Mascotas::create($data);
       

        //return redirect('inicio')->withErrors([]);
    //}

    public function index(){
        $especies = \App\Models\Especie::all();
        return view('MascotasDisponibles', compact('especies'));
    }







////// prueba1 //////

   public function prueba1()
    {
        $especies = \App\Models\Especie::all();
        return view('prueba1', compact('especies'));
    }

}
