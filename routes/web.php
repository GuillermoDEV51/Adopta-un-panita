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
use App\Http\Controllers\VoluntariosAdminController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


// Login Route
Route::get('/login', [LoginController::class, 'index']);



// Register Route

Route::get('/register', [RegistroController::class, 'index'])->name('register');

// admin Route
Route::get('/admin/añadir-refugio', [AñadirRefugioController::class, 'index'])->name('AñadirRefugio');
Route::get('/admin/gatos', [GatosAdminController::class, 'index'])->name('GatosAdmin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('/admin/perros',[PerrosAdminController::class,'index'])->name('PerrosAdmin');
Route::get('/admin/refugios',[RefugiosAdminController::class,'index'])->name('RefugiosAdmin');
Route::get('/admin/solicitudes',[SolicitudesAdminController::class,'index'])->name('SolicitudesAdmin');
Route::get('/admin/usuarios',[UsuariosAdminController::class,'index'])->name('UsuariosAdmin');
Route::get('/admin/voluntarios', [VoluntariosAdminController::class, 'index'])->name('VoluntariosAdmin');

// Other Routes