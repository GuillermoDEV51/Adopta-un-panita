<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function show()
    {
     
        return view('auth.Login');
    }

    public function login(LoginRequest $request)
    {


        $credentials = $request->only('nombre', 'password');
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('Dashboard'));
        }
        return back()->withErrors(['login' => 'Las credenciales no coinciden con nuestros registros.']);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
