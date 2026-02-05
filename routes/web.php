<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotasDisponiblesController;
use App\Http\Controllers\InicioController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/



Route::get('/', [InicioController::class, 'show'])->name('Inicio');






//Route::post('/', [MascotasDisponiblesController::class, 'publicar'])->name('publicarMascota')->middleware('auth');





Route::get('/MascotasDisponibles', [MascotasDisponiblesController::class, 'show'])->name('MascotasDisponibles');

// Publicación de Mascotas (Usuarios)
Route::post('/', [InicioController::class, 'publicar'])->name('publicarMascota');

Route::get('/mascotas/publicar', [MascotasDisponiblesController::class, 'create'])->name('vistavacia')->middleware('auth'); // Mantenemos name 'vistavacia' si el front lo usa, o lo migramos.
Route::post('/mascotas/publicar', [MascotasDisponiblesController::class, 'store'])->name('publicar2');

Route::post('/mascotas/{id}/adoptar', [MascotasDisponiblesController::class, 'solicitarAdopcion'])->name('mascotas.adoptar')->middleware('auth');
Route::post('/solicitar-verificacion', [MascotasDisponiblesController::class, 'requestVerification'])->name('verification.request')->middleware('auth');




Route::get('/RefugiosDisponibles', function () {
    return view('RefugiosDisponibles');
})->name('RefugiosDisponibles');



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
    return view('Publicaciones');
});

/*
|--------------------------------------------------------------------------
| Autenticación (Laravel)
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Rutas Admin externas
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/Admin/admin_route.php';
