<?php

namespace App\Http\Controllers;

use App\Http\Requests\MascotasRequest;
use App\Models\Especie;
use App\Models\Mascotas;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotasDisponiblesController extends Controller
{
    // cargar vista con las mascotas
    public function show()
    {
        $mascotas = Mascotas::with('especie', 'usuario')->get();
        $especies = Especie::all();
        $usuarios = Usuarios::all();

        return view('MascotasDisponibles', compact('mascotas', 'especies', 'usuarios'));
    }

    // Método para mostrar el formulario de creación (anteriormente vistavacia)
    public function create()
    {
        $especies = Especie::all();

        return view('vistavacia', compact('especies'));
    }

    // Método para guardar la mascota (anteriormente publicar2)
    public function store(MascotasRequest $request)
    {
        if (! Auth::check()) {
            return back()->withErrors(['error' => 'Debes iniciar sesión para publicar.']);
        }

        $data = $request->validated();
        $data['id_usuario'] = Auth::id();

        if ($request->hasFile('foto')) {
            $data['foto'] = basename($request->file('foto')->store('mascotas', 'public'));
        }

        if ($request->hasFile('documentacion')) {
            $files = [];
            foreach ($request->file('documentacion') as $file) {
                // Se guarda en storage/app/public/documentacion
                $files[] = basename($file->store('documentacion', 'public'));
            }
            $data['documentacion'] = json_encode($files);
        }

        // 'ubicacion' se obtiene por la relación con el usuario, no se guarda en mascotas.
        unset($data['ubicacion']);

        // Rellenar 'telefono' con los datos del usuario si no viene en el request
        // O forzarlo siempre según lo que indica el usuario.
        // Dado que el campo es obligatorio en la tabla `mascotas`, asignamos el del usuario logueado.
        if (empty($data['telefono'])) {
            $data['telefono'] = Auth::user()->telefono;
        }

        // Validar que realmente tengamos un teléfono
        if (empty($data['telefono'])) {
            return back()->withErrors(['error' => 'Tu perfil de usuario no tiene un número de teléfono registrado. Por favor, actualiza tu perfil para poder publicar.'])->withInput();
        }

        Mascotas::create($data);

        return redirect()->route('MascotasDisponibles')
            ->with('success', 'Mascota publicada exitosamente!');
    }

    public function solicitarAdopcion(Request $request, $mascotaId)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión para adoptar.']);
        }

        $user = Auth::user();

        // [NUEVO] Verificación de Usuario
        if ($user->estado_verificacion !== 'verificado') {
            // Si está pendiente, informar
            if ($user->estado_verificacion === 'pendiente') {
                return back()->with('warning', 'Tu solicitud de verificación está en revisión por un administrador.');
            }
            // Si no está verificado o rechazado
            return back()->with('require_verification', true);
        }

        $request->validate([
            'mensaje' => 'nullable|string|max:1000',
        ]);

        $existing = \App\Models\SolicitudAdopcion::where('user_id', Auth::id())
            ->where('mascota_id', $mascotaId)
            ->where('estado', 'pendiente')
            ->first();

        if ($existing) {
            return back()->with('warning', 'Ya tienes una solicitud pendiente para esta mascota.');
        }

        \App\Models\SolicitudAdopcion::create([
            'user_id' => Auth::id(),
            'mascota_id' => $mascotaId,
            'mensaje' => $request->input('mensaje'),
            'estado' => 'pendiente',
        ]);

        return back()->with('success', 'Tu solicitud de adopción ha sido enviada con éxito.');
    }

    public function requestVerification()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->estado_verificacion === 'no_verificado' || $user->estado_verificacion === 'rechazado') {
            $user->estado_verificacion = 'pendiente';
            $user->save();
            return back()->with('success', '¡Solicitud de verificación enviada! Un administrador revisará tu perfil.');
        }

        return back()->with('info', 'Tu solicitud ya está en estado: ' . $user->estado_verificacion);
    }
}
