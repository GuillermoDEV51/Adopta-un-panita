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





// RUTAS Q ALARCON PUSO PA VE ESA MIELDA


Route::get('/MascotasDisponibles', [MascotasDisponiblesController::class, 'show'])->name('MascotasDisponibles');


Route::get('/vistavacia', [MascotasDisponiblesController::class, 'vistavacia'])->name('vistavacia')->middleware('auth');
Route::post('/vistavacia', [MascotasDisponiblesController::class, 'publicar2'])->name('publicar2');




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
