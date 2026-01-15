<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index()
    {
     
        return view('Login');
    }

    public function authenticate(LoginRequest $request)
    {
        

          $credentials = $request->only('nombre', 'password');
            if (auth()) {
                $request->session()->regenerate();
    
                return redirect()->intended('dashboard');
            }
        return back()->withErrors('Las credenciales no coinciden con nuestros registros.');

    }

    public function logout(Request $request)
    {
        //
    }

}
