<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
   public function show(){

    return view('auth.Registro');
    
   }

   public function store(RegistroRequest $request){

      $usuario = Usuarios::create([
        $request->validate()
      ]);
      return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
   }
}
