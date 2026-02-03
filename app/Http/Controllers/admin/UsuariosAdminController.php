<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use App\Models\Roles;

class UsuariosAdminController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('admin.UsuariosAdmin', compact('usuarios'));
    }

    public function show()
    {
        $roles = Roles::all();
        return view('admin.AddUser', compact('roles'))->with('success', 'Usuario registrado correctamente.');
    }

    
    public function store(RegistroRequest $request)
   {
       

       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);
        // Asignar rol predeterminado si no se proporciona
        if (!isset($data['id_rol'])) {
           $data['id_rol'] = 2;
        }
            $user = Usuarios::create($data);

          

         return redirect('UsuariosAdmin')->with('success','Registro exitoso. Has iniciado sesión.');
   }

   public function update(RegistroRequest $request, $id)
   {
       $usuario = Usuarios::findOrFail($id);
       $data = $request->validated();

       // Verificar si se proporcionó una nueva contraseña
       if (!empty($data['password'])) {
           $data['password'] = Hash::make($data['password']);
       } else {
           // Si no se proporcionó, eliminar la clave 'password' para no actualizarla
           unset($data['password']);
       }

       $usuario->update($data);

       return redirect()->route('UsuariosAdmin')->with('success', 'Usuario actualizado correctamente.');
   }


   public function eliminar($id)
   {
       $usuario = Usuarios::findOrFail($id);
       $usuario->delete();

       return redirect()->route('UsuariosAdmin')->with('success', 'Usuario eliminado correctamente.');
   }
}
