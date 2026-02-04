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



  



    // Rutas para la gestión de animales
    Route::get('/admin/animales', [AnimalesController::class, 'show'])->name('AdminAnimales');
    Route::get('/admin/animales/registrar', [AnimalesController::class, 'index'])->name('AddPets');

    Route::get('/admin/animales/editar/{id}', [AnimalesController::class, 'editar'])->name('EditarAnimal');


    Route::post('/admin/animales/editar/{id}', [AnimalesController::class, 'update'])->name('ActualizarAnimal');
    

    Route::delete('/admin/animales/eliminar/{id}', [AnimalesController::class, 'eliminar'])->name('EliminarAnimal');





    // Rutas para la gestión de usuarios

    Route::get('/admin/usuarios', [UsuariosAdminController::class, 'index'])->name('UsuariosAdmin');

    Route::get('/admin/usuarios/editar/{id}', [UsuariosAdminController::class, 'edit'])->name('EditarUsuario');
    Route::put('/admin/usuarios/editar/{id}', [UsuariosAdminController::class, 'update'])->name('ActualizarUsuario');
    

    Route::get('/admin/usuarios/registrar', [UsuariosAdminController::class, 'show'])->name('GuardarUsuario');
    Route::post('/admin/usuarios/registrar', [UsuariosAdminController::class, 'store'])->name('RegistrarUsuario');
    Route::delete('/admin/usuarios/eliminar/{id}', [UsuariosAdminController::class, 'eliminar'])->name('EliminarUsuario');



    
});


