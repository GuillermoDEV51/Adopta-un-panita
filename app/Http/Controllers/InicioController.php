<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\Especie; 
use App\Http\Requests\MascotasRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class InicioController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::all();
        $refugios = Refugios::all();
        $especies = Especie::all(); 
        
        return view('inicio', compact('refugios', 'mascotas', 'especies'));
    }

    public function publicar(MascotasRequest $request){

            if (!Auth::check()) {
                return back()->withErrors(['error' => 'Debes iniciar sesión para publicar.']);
            }

    

            $data = $request->validated();

            $data['id_usuario'] = Auth::user()->id;

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('mascotas', 'public');
                 $data['foto'] = basename($path);
            }

    if ($request->hasFile('documentacion')) {
        $files = [];

        foreach ($request->file('documentacion') as $file) {
            $path = $file->store('documentos', 'public');
            $files[] = basename($path);
        }

        $data['documentacion'] = json_encode($files);
    }

    try {
        Mascotas::create($data);

        return redirect()
            ->route('Inicio')
            ->with('success', 'Mascota publicada exitosamente');

    } catch (\Exception $e) {

        return back()
            ->withErrors(['error' => $e->getMessage()])
            ->withInput();
    }
}
}
