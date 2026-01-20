<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/



Route::get('/', function () {
    return view('inicio');
})->name('Inicio');






// RUTAS Q ALARCON PUSO PA VE ESA MIELDA




Route::get('/MascotasDisponibles', function () {
    return view('MascotasDisponibles'); 
})->name('MascotasDisponibles');

Route::get('/RefugiosDisponibles', function () {
    return view('RefugiosDisponibles');
})->name('RefugiosDisponibles');

Route::get('/FormularioDeAbandono', function () {
    return view('FormularioDeAbandono');
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
