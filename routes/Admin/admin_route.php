<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AñadirRefugioController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RefugiosAdminController;
use App\Http\Controllers\admin\SolicitudesAdminController;
use App\Http\Controllers\admin\UsuariosAdminController;
use App\Http\Controllers\admin\AnimalesController;
use App\Http\Middleware\CheckRol;





// admin Route
Route::middleware(['auth', ])->group(function () {
    Route::get('/admin/añadir-refugio', [AñadirRefugioController::class, 'index'])->name('AñadirRefugio');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('Dashboard');
    Route::get('/admin/refugios', [RefugiosAdminController::class, 'index'])->name('RefugiosAdmin');
    Route::get('/admin/solicitudes', [SolicitudesAdminController::class, 'index'])->name('SolicitudesAdmin');
    Route::get('/admin/usuarios', [UsuariosAdminController::class, 'index'])->name('UsuariosAdmin');



    // Rutas para la gestión de animales
    Route::get('/admin/animales', [AnimalesController::class, 'show'])->name('AdminAnimales');

    Route::resource('admin/animales', AnimalesController::class)->only([
        
    ]);




    
});


