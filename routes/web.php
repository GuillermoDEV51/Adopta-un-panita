<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\MascotasDisponiblesController;
use App\Http\Controllers\RefugioDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [InicioController::class, 'show'])->name('Inicio');

// Route::post('/', [MascotasDisponiblesController::class, 'publicar'])->name('publicarMascota')->middleware('auth');

Route::get('/MascotasDisponibles', [MascotasDisponiblesController::class, 'show'])->name('MascotasDisponibles');

// Publicación de Mascotas (Usuarios)
Route::post('/', [InicioController::class, 'publicar'])->name('publicarMascota');

Route::get('/mascotas/publicar', [MascotasDisponiblesController::class, 'create'])->name('vistavacia')->middleware('auth'); // Mantenemos name 'vistavacia' si el front lo usa, o lo migramos.
Route::post('/mascotas/publicar', [MascotasDisponiblesController::class, 'store'])->name('publicar2');

Route::post('/mascotas/{id}/adoptar', [MascotasDisponiblesController::class, 'solicitarAdopcion'])->name('mascotas.adoptar')->middleware('auth');
Route::post('/solicitar-verificacion', [MascotasDisponiblesController::class, 'requestVerification'])->name('verification.request')->middleware('auth');

Route::get('/RefugiosDisponibles', function () {
    $refugios = \App\Models\Refugios::all();
    return view('RefugiosDisponibles', compact('refugios'));
})->name('RefugiosDisponibles');

Route::get('/refugios/{id}/mascotas', [InicioController::class, 'refugioMascotas'])
    ->name('RefugioMascotas');

Route::get('/FormularioDeAbandono', function () {
    return view('FormularioDeAbandono');
});

Route::get('/Donativos', function () {
    return view('Donativos');
});

Route::get('/PreguntasFrecuentes', function () {
    return view('PreguntasFrecuentes');
});

Route::get('/Mision', function () {
    return view('Mision');
});

Route::get('/Publicaciones', function () {
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    $orden = request('orden', 'desc') === 'asc' ? 'asc' : 'desc';
    $mascotas = \App\Models\Mascotas::with('especie')
        ->where('id_usuario', auth()->id())
        ->orderBy('created_at', $orden)
        ->get();

    $totalMascotas = $mascotas->count();
    $especies = \App\Models\Especie::all();

    return view('Publicaciones', compact('mascotas', 'totalMascotas', 'orden', 'especies'));
})->name('Publicaciones');

Route::post('/Publicaciones/{id}', [\App\Http\Controllers\MascotasDisponiblesController::class, 'updateUser'])
    ->name('PublicacionesUpdate');

/*
|--------------------------------------------------------------------------
| Autenticación (Laravel)
|--------------------------------------------------------------------------
*/

require_once __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Rutas Admin externas
|--------------------------------------------------------------------------
*/

require_once __DIR__.'/Admin/admin_route.php';

/*
|--------------------------------------------------------------------------
| Rutas Refugio
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/refugio/dashboard', [RefugioDashboardController::class, 'index'])->name('refugio.dashboard');
    Route::get('/refugio/perfil', [RefugioDashboardController::class, 'createProfile'])->name('refugio.createProfile');
    Route::post('/refugio/perfil', [RefugioDashboardController::class, 'storeProfile'])->name('refugio.storeProfile');
    Route::get('/refugio/solicitudes', [RefugioDashboardController::class, 'solicitudes'])->name('refugio.solicitudes'); // Just in case we need direct link
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mis-solicitudes', [App\Http\Controllers\UserDashboardController::class, 'solicitudes'])->name('user.solicitudes');
});
