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

    public function showRefugio()
    {
        return view('auth.LoginRefugio');
    }

    public function login(LoginRequest $request)
    {


        $credentials = $request->only('password');
        
        // Permitir el inicio de sesión con correo electrónico o nombre
        $loginField = filter_var($request->input('nombre'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nombre';
        $credentials[$loginField] = $request->input('nombre');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redirigir según el rol
            // 1: Admin -> Dashboard
            // 4: Refugio -> Panel de Refugio
            // 2: Usuario -> Panel de Usuario (Mis Solicitudes)
            // Nota: Ajustar IDs según la verificación de la base de datos
            
            switch ($user->id_rol) {
                case 1: // Admin
                    return redirect()->route('Dashboard');
                case 4: // Refugio
                case 5: // Refugio (Respaldo por si acaso)
                    return redirect()->route('refugio.dashboard');
                default: // Usuario regular (Generalmente ID 2)
                    return redirect()->route('user.solicitudes'); // O 'Inicio' si prefieren
            }
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
