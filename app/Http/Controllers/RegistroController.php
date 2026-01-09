<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
   public function show(){

    return view('auth.Registro');
    
   }

   public function store(RegistroRequest $request){

    // Validar los datos del formulario
    $validatedData = $request->validated();

    // Crear un nuevo usuario
    $user = new \App\Models\User();
    $user->nombre = $validatedData['nombre'];
    $user->apellido = $validatedData['apellido'];
    
    $user->password = bcrypt($validatedData['password']);
    $user->save();

    // Redirigir a la página de inicio de sesión con un mensaje de éxito
    return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
   }
}
