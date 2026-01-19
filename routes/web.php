<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/



Route::get('/', function () {
    return view('inicio');
})->name('inicio');






// RUTAS Q ALARCON PUSO PA VE ESA MIELDA


Route::get('/AñadirRefugio', function () {
    return view('AñadirRefugio');
});





Route::get('/Donativos', function () {
    return view('Donativos');
});

Route::get('/EnviarFormulario', function () {
    return view('EnviarFormulario');
});

Route::get('/FormularioEnviado', function () {
    return view('FormularioEnviado');
});

Route::get('/GatosAdmin', function () {
    return view('GatosAdmin');
});

Route::get('/PerrosAdmin', function () {
    return view('PerrosAdmin');
});

Route::get('/RefugiosAdmin', function () {
    return view('RefugiosAdmin');
});

Route::get('/SolicitudesAdmin', function () {
    return view('SolicitudesAdmin');
});

Route::get('/UsuariosAdmin', function () {
    return view('UsuariosAdmin');
});

Route::get('/MascotasDisponibles', function () {
    return view('MascotasDisponibles'); 
});

Route::get('/RefugiosDisponibles', function () {
    return view('RefugiosDisponibles');
});

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
