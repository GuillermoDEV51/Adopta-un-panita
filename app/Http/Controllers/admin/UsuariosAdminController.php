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

    //cargar vistas de
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

    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $roles = Roles::all();
        return view('admin.EditarUsuario', compact('usuario', 'roles'));
    }

    //Funciones para CRUD de usuarios
    public function store(RegistroRequest $request)
   {
       

       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);


          // CORRECCIÓN: Asegurar que id_rol esté presente
        if (!isset($data['id_rol']) || empty($data['id_rol'])) {
            // Opcional: asignar un rol por defecto
            $data['id_rol'] = 2; // Rol por defecto (ej: usuario normal)
        }
            $user = Usuarios::create($data);

          

         return redirect()->route('UsuariosAdmin')->with('success','Registro exitoso. Usuario agregado.');
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
