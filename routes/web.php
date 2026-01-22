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
Route::post('/', [InicioController::class, 'publicar'])->name('Inicio.add');




Route::get('/vistavacia', [InicioController::class, 'index'])->name('vistavacia');
Route::post('/vistavacia', [InicioController::class, 'publicar'])->name('vistavacia.add');





// RUTAS Q ALARCON PUSO PA VE ESA MIELDA


Route::get('/MascotasDisponibles', [MascotasDisponiblesController::class, 'show'])->name('MascotasDisponibles');



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


Route::get('/Misionyvision', function () {
    return view('Misionyvision');
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
