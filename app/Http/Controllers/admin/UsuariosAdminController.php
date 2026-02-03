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



    public function show($id){

        $usuario = Usuarios::findOrFail($id);
        $roles = Roles::all();
        return view('admin.RegistroUsuarios', compact('usuario', 'roles'));
        
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

            Auth::login($user);

            return redirect('Dashboard')->with('success','Registro exitoso. Has iniciado sesión.');
   }
}
