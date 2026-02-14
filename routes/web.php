<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\MascotasDisponiblesController;
use App\Http\Controllers\RefugioDashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [InicioController::class, 'show'])->name('Inicio');

// Listado de mascotas disponibles
Route::get('/MascotasDisponibles', [MascotasDisponiblesController::class, 'show'])->name('MascotasDisponibles');

// Publicación de Mascotas (Usuarios)
Route::post('/', [InicioController::class, 'publicar'])->name('publicarMascota');

// Rutas estáticas (Manejadas por InicioController)
Route::get('/RefugiosDisponibles', function () {
    $refugios = \App\Models\Refugios::all();
    return view('RefugiosDisponibles', compact('refugios'));
})->name('RefugiosDisponibles'); // TODO: Mover a InicioController::refugiosDisponibles si se desea limpiar más.

Route::get('/refugios/{id}/mascotas', [InicioController::class, 'refugioMascotas'])->name('RefugioMascotas');

Route::get('/FormularioDeAbandono', [InicioController::class, 'formularioAbandono']);
Route::get('/Donativos', [InicioController::class, 'donativos']);
Route::get('/PreguntasFrecuentes', [InicioController::class, 'preguntasFrecuentes']);
Route::get('/Mision', [InicioController::class, 'mision']);

/*
|--------------------------------------------------------------------------
| Autenticación (Laravel)
|--------------------------------------------------------------------------
*/

require_once __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Gestión de mascotas
    Route::get('/mascotas/publicar', [MascotasDisponiblesController::class, 'create'])->name('vistavacia');
    Route::post('/mascotas/publicar', [MascotasDisponiblesController::class, 'store'])->name('publicar2');
    Route::post('/mascotas/{id}/adoptar', [MascotasDisponiblesController::class, 'solicitarAdopcion'])->name('mascotas.adoptar');
    Route::post('/solicitar-verificacion', [MascotasDisponiblesController::class, 'requestVerification'])->name('verification.request');
    
    // Publicaciones del usuario
    Route::get('/Publicaciones', [MascotasDisponiblesController::class, 'misPublicaciones'])->name('Publicaciones');
    Route::post('/Publicaciones/{id}', [MascotasDisponiblesController::class, 'updateUser'])->name('PublicacionesUpdate');
    
    // Solicitudes recibidas por el usuario
    Route::get('/mis-solicitudes', [UserDashboardController::class, 'solicitudes'])->name('user.solicitudes');

    // Rutas para Refugios
    Route::get('/refugio/dashboard', [RefugioDashboardController::class, 'index'])->name('refugio.dashboard');
    Route::get('/refugio/perfil', [RefugioDashboardController::class, 'createProfile'])->name('refugio.createProfile');
    Route::post('/refugio/perfil', [RefugioDashboardController::class, 'storeProfile'])->name('refugio.storeProfile');
    Route::get('/refugio/solicitudes', [RefugioDashboardController::class, 'solicitudes'])->name('refugio.solicitudes');
});

/*
|--------------------------------------------------------------------------
| Rutas Admin externas
|--------------------------------------------------------------------------
*/

require_once __DIR__.'/Admin/admin_route.php';

