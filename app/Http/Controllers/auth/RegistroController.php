<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
   public function show(){

    return view('auth.Registro');
    
   }

   public function store(RegistroRequest $request)
   {
       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);
      Usuarios::create($data);
      return redirect('/')->with('success','Registro exitoso. Por favor,  inicia sesión.');
   }
}
