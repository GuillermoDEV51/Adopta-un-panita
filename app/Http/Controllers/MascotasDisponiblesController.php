<?php

namespace App\Http\Controllers;

use App\Http\Requests\MascotasRequest;
use App\Models\Especie;
use App\Models\Mascotas;
use App\Models\Refugios;
use App\Models\SolicitudAdopcion;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotasDisponiblesController extends Controller
{
    /**
     * Muestra todas las mascotas disponibles.
     */
    public function show()
    {
        $mascotas = Mascotas::with('especie', 'usuario')->get();
        $especies = Especie::all();
        $usuarios = Usuarios::all();

        return view('MascotasDisponibles', compact('mascotas', 'especies', 'usuarios'));
    }

    /**
     * Muestra el formulario para publicar una nueva mascota.
     */
    public function create()
    {
        $especies = Especie::all();

        return view('vistavacia', compact('especies'));
    }

    /**
     * Almacena una nueva mascota en la base de datos.
     */
    public function store(MascotasRequest $request)
    {
        if (! Auth::check()) {
            return back()->withErrors(['error' => 'Debes iniciar sesión para publicar.']);
        }

        $data = $request->validated();
        $data['id_usuario'] = Auth::id();

        if (in_array(Auth::user()->id_rol, [4, 5], true)) {
            $refugio = Refugios::where('user_id', Auth::id())->first();
            if ($refugio) {
                $data['id_refugio'] = $refugio->id;
            }
        }

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

        // Guardar la ubicación propia de la mascota (campo en tabla `mascotas`).

        // Rellenar 'telefono' con los datos del usuario si no viene en el request
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

    /**
     * Gestiona la solicitud de adopción de una mascota.
     */
    public function solicitarAdopcion(Request $request, $mascotaId)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión para adoptar.']);
        }

        $user = Auth::user();

        // Verificación de Usuario
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

        $existing = SolicitudAdopcion::where('user_id', Auth::id())
            ->where('mascota_id', $mascotaId)
            ->where('estado', 'pendiente')
            ->first();

        if ($existing) {
            return back()->with('warning', 'Ya tienes una solicitud pendiente para esta mascota.');
        }

        SolicitudAdopcion::create([
            'user_id' => Auth::id(),
            'mascota_id' => $mascotaId,
            'mensaje' => $request->input('mensaje'),
            'estado' => 'pendiente',
        ]);

        return back()->with('success', 'Tu solicitud de adopción ha sido enviada con éxito.');
    }

    /**
     * Solicita la verificación de la cuenta del usuario.
     */
    public function requestVerification()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->estado_verificacion === 'no_verificado' || $user->estado_verificacion === 'rechazado') {
            $user->estado_verificacion = 'pendiente';
            $user->save();

            return back()->with('success', '¡Solicitud de verificación enviada! Un administrador revisará tu perfil.');
        }

        return back()->with('info', 'Tu solicitud ya está en estado: '.$user->estado_verificacion);
    }

    /**
     * Actualiza la información de una mascota (Usuario común).
     */
    public function updateUser(MascotasRequest $request, $id)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $mascota = Mascotas::findOrFail($id);

        if ($mascota->id_usuario !== Auth::id()) {
            return back()->withErrors(['error' => 'No tienes permiso para actualizar esta mascota.']);
        }

        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = basename($request->file('foto')->store('mascotas', 'public'));
        }

        if ($request->hasFile('documentacion')) {
            $files = [];
            foreach ($request->file('documentacion') as $file) {
                $files[] = basename($file->store('documentacion', 'public'));
            }
            $data['documentacion'] = json_encode($files);
        }

        $mascota->update($data);

        if (in_array(Auth::user()->id_rol, [4, 5], true)) {
            return redirect()->route('refugio.dashboard')->with('success', 'Mascota actualizada correctamente.');
        }

        return redirect()->route('Publicaciones')->with('success', 'Mascota actualizada correctamente.');
    }
}
