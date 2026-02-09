<?php
namespace App\Http\Controllers;

use App\Http\Requests\MascotasRequest;
use App\Models\Especie;
use App\Models\Mascotas;
use App\Models\Refugios;
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

    // MÃƒÂ©todo para mostrar el formulario de creaciÃƒÂ³n (anteriormente vistavacia)
    public function create()
    {
        $especies = Especie::all();

        return view('vistavacia', compact('especies'));
    }

    // MÃƒÂ©todo para guardar la mascota (anteriormente publicar2)
    public function store(MascotasRequest $request)
    {
        if (! Auth::check()) {
            return back()->withErrors(['error' => 'Debes iniciar sesiÃƒÂ³n para publicar.']);
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

        // Guardar la ubicaciÃƒÂ³n propia de la mascota (campo en tabla `mascotas`).

        // Rellenar 'telefono' con los datos del usuario si no viene en el request
        // O forzarlo siempre segÃƒÂºn lo que indica el usuario.
        // Dado que el campo es obligatorio en la tabla `mascotas`, asignamos el del usuario logueado.
        if (empty($data['telefono'])) {
            $data['telefono'] = Auth::user()->telefono;
        }

        // Validar que realmente tengamos un telÃƒÂ©fono
        if (empty($data['telefono'])) {
            return back()->withErrors(['error' => 'Tu perfil de usuario no tiene un nÃƒÂºmero de telÃƒÂ©fono registrado. Por favor, actualiza tu perfil para poder publicar.'])->withInput();
        }

        Mascotas::create($data);

        return redirect()->route('MascotasDisponibles')
            ->with('success', 'Mascota publicada exitosamente!');
    }

    public function solicitarAdopcion(Request $request, $mascotaId)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesiÃƒÂ³n para adoptar.']);
        }

        $user = Auth::user();

        // [NUEVO] VerificaciÃƒÂ³n de Usuario
        if ($user->estado_verificacion !== 'verificado') {
            // Si estÃƒÂ¡ pendiente, informar
            if ($user->estado_verificacion === 'pendiente') {
                return back()->with('warning', 'Tu solicitud de verificaciÃƒÂ³n estÃƒÂ¡ en revisiÃƒÂ³n por un administrador.');
            }
            // Si no estÃƒÂ¡ verificado o rechazado
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

        return back()->with('success', 'Tu solicitud de adopciÃƒÂ³n ha sido enviada con ÃƒÂ©xito.');
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
            return back()->with('success', 'Ã‚Â¡Solicitud de verificaciÃƒÂ³n enviada! Un administrador revisarÃƒÂ¡ tu perfil.');
        }

        return back()->with('info', 'Tu solicitud ya estÃƒÂ¡ en estado: ' . $user->estado_verificacion);
    }

    // Actualizar mascota desde Publicaciones (usuario comÃƒÆ’Ã‚Âºn)
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




