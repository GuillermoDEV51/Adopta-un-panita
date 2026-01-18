<?php


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
})->name('Inicio');




require_once __DIR__ . '/Admin/admin_route.php';
require_once __DIR__ . '/auth.php';

// RUTAS Q ALARCON PUSO PA VE ESA MIELDA







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

Route::get('/Login', function () {
    return view('auth.Login');
});

Route::get('/PerrosAdmin', function () {
    return view('PerrosAdmin');
});

Route::get('/RefugiosAdmin', function () {
    return view('RefugiosAdmin');
});

Route::get('/Registro', function () {
    return view('auth.Registro'); 
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

;

Route::get('/Misionyvision', function () {
    return view('/Misionyvision');
});

Route::get('/Publicaciones', function () {
    return view('/Publicaciones');
});
