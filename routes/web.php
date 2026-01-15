<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;

use App\Http\Controllers\AñadirRefugioController;
use App\Http\Controllers\GatosAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerrosAdminController;
use App\Http\Controllers\RefugiosAdminController;
use App\Http\Controllers\SolicitudesAdminController;
use App\Http\Controllers\UsuariosAdminController;

use Illuminate\Support\Facades\Route;




// Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');



// Register Route

Route::get('/register', [RegistroController::class, 'show'])->name('register');
Route::post('/register', [RegistroController::class, 'store'])->name('register.store');

// admin Route
Route::get('/admin/añadir-refugio', [AñadirRefugioController::class, 'index'])->name('AñadirRefugio');
Route::get('/admin/gatos', [GatosAdminController::class, 'index'])->name('GatosAdmin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('/admin/perros',[PerrosAdminController::class,'index'])->name('PerrosAdmin');
Route::get('/admin/refugios',[RefugiosAdminController::class,'index'])->name('RefugiosAdmin');
Route::get('/admin/solicitudes',[SolicitudesAdminController::class,'index'])->name('SolicitudesAdmin');
Route::get('/admin/usuarios',[UsuariosAdminController::class,'index'])->name('UsuariosAdmin');

// RUTAS Q ALARCON PUSO PA VE ESA MIELDA

Route::get('/', function () {
    return view('auth.Login');
});

Route::get('/AñadirRefugio', function () {
    return view('AñadirRefugio');
});

Route::get('/Dashboard', function () {
    return view('Dashboard');
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

Route::get('/Inicio', function () {
    return view('Inicio');
});

Route::get('/Misionyvision', function () {
    return view('/Misionyvision');
});