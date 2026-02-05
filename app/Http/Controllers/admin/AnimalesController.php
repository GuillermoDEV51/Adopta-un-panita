<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.AnimalesAdmin', compact('mascotas', 'especies'));
    }

    public function index()
    {
        $mascotas = Mascotas::all();
        $especies = Especie::all();
        return view('admin.AddPets', compact('mascotas', 'especies'));
    }


    public function editar($id)
    {
        $mascota = Mascotas::findOrFail($id);
        $especies = Especie::all();
        return view('admin.EditarAnimal', compact('mascota', 'especies'));
    }





    public function eliminar($id)
    {
        $mascota = Mascotas::findOrFail($id);
        $mascota->delete();

        return redirect()->route('AdminAnimales')->with('success', 'Mascota eliminada correctamente.');
    }


    public function create(MascotasRequest $request)
    {


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

        // 🔹 Redirigir a la lista de mascotas disponibles
        return redirect()->route('AdminAnimales')
            ->with('success', 'Mascota registrada exitosamente!');
    }

    public function update(MascotasRequest $request, $id)
    {
        $mascota = Mascotas::findOrFail($id);

        $mascota->update($request->validated());


        return view('admin.AnimalesAdmin');
    }
}
