<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
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
      return redirect('/')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
   }
}
