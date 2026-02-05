<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MascotasRequest;
use App\Models\Mascotas;

use App\Models\Especie;

use Illuminate\Support\Facades\Storage;

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
        return view('admin.EditPets', compact('mascota', 'especies'));
    }





    public function eliminar($id)
    {
        $mascota = Mascotas::findOrFail($id);

        $filesToDelete = [];

        if ($mascota->foto) {
            $filesToDelete[] = 'mascotas/' . $mascota->foto;
        }

        if ($mascota->documentacion) {
            $filesToDelete[] = 'documentacion/' . $mascota->documentacion;
        }

        if (!empty($filesToDelete)) {
            Storage::disk('public')->delete($filesToDelete);
        }

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
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            // Eliminar foto antigua si existe
            if ($mascota->foto) {
                Storage::disk('public')->delete('mascotas/' . $mascota->foto);
            }
            $data['foto'] = basename($request->file('foto')->store('mascotas', 'public'));
        }

        if ($request->hasFile('documentacion')) {
            // Eliminar documentación antigua si existe
            if ($mascota->documentacion) {
                Storage::disk('public')->delete('documentacion/' . $mascota->documentacion);
            }
            $data['documentacion'] = basename($request->file('documentacion')->store('documentacion', 'public'));
        }

        $mascota->update($data);

        return redirect()->route('AdminAnimales')->with('success', 'Mascota actualizada correctamente.');
    }
}
