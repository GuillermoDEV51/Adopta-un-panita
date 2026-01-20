<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
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
        // Asignar rol predeterminado si no se proporciona
        if (!isset($data['id_rol'])) {
           $data['id_rol'] = 2;
        }
            $user = Usuarios::create($data);

            Auth::login($user);

            return redirect('/')->with('success','Registro exitoso. Has iniciado sesión.');
   }
}
