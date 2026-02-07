<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Refugios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RefugiosRequest;

use App\Models\Usuarios;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RefugiosAdminController extends Controller
{
    public function index()
    {
        $refugios = Refugios::with('user')->get(); // Load user relationship
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
        try {
            DB::beginTransaction();

            // 1. Find Refugio Role
            $role = Roles::where('name', 'Refugio')->firstOrFail();

            // 2. Create User (Authenticable)
            // 'apellido' is required in table, so we use a placeholder or split 'responsable_nombre' if allowed.
            // For now using 'Refugio' as surname marker or we could add apellido field to form later.
            $usuario = Usuarios::create([
                'ci' => $request->cedula_responsable,
                'nombre' => $request->responsable_nombre,
                'apellido' => 'Refugio', // Placeholder as form doesn't have surname
                'password' => Hash::make($request->password_refugio),
                'telefono' => $request->telefono_refugio,
                'ubicacion' => $request->direccion_refugio,
                'id_rol' => $role->id,
                'estado_verificacion' => 'verificado', // Admins creating shelters -> auto verified?
            ]);

            // Handle Image Upload
            $imagePath = null;
            if ($request->hasFile('foto_portada')) {
                $imagePath = $request->file('foto_portada')->store('refugios', 'public');
            }

            // 3. Create Refugio linked to User
            Refugios::create([
                'nombre' => $request->nombre_refugio,
                'direccion' => $request->direccion_refugio,
                'telefono' => $request->telefono_refugio,
                'email' => $request->email_refugio,
                'descripcion' => $request->descripcion_refugio,
                'user_id' => $usuario->id,
                'redes_sociales' => $request->redes_sociales,
                'imagen' => $imagePath,
            ]);

            DB::commit();

            return redirect()->route('RefugiosAdmin')->with('success', 'Refugio registrado exitosamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al registrar refugio: ' . $e->getMessage()])->withInput();
        }
    }

    /*
    * El metodo 'editar' ya existia en el codigo original pero con nombre inconsistente
    * o duplicado en terminos de funcionalidad con 'show' del original. 
    * Lo estamos ajustando para que sea coherente.
    */

    Public function update(Request $request, $id)
    {
        $refugio = Refugios::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'redes_sociales' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('refugios', 'public');
        }

        $refugio->update($data);

        return redirect()->route('RefugiosAdmin')->with('success', 'Refugio actualizado correctamente.');
    }

    Public function eliminar($id)
    {
        $refugio = Refugios::findOrFail($id);
        $refugio->delete();

        return redirect()->route('RefugiosAdmin')->with('success', 'Refugio eliminado correctamente.');
    }
}
