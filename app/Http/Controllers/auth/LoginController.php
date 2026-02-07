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
        
        // Allow login with either email or nombre
        $loginField = filter_var($request->input('nombre'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nombre';
        $credentials[$loginField] = $request->input('nombre');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redirect based on role
            // 1: Admin -> Dashboard
            // 4: Refugio -> Refugio Dashboard
            // 2: User -> User Dashboard (My Requests)
            // Note: Adjust IDs based on database verification
            
            switch ($user->id_rol) {
                case 1: // Admin
                    return redirect()->route('Dashboard');
                case 4: // Refugio
                case 5: // Refugio (Backup in case)
                    return redirect()->route('refugio.dashboard');
                default: // Regular User (ID 2 usually)
                    return redirect()->route('user.solicitudes'); // Or 'Inicio' if they prefer
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
