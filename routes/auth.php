<?php


use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegistroController;
use Illuminate\Support\Facades\Route;


// Login Route
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Register Route

Route::get('/register', [RegistroController::class, 'show'])->name('register');
Route::post('/register', [RegistroController::class, 'store'])->name('register.store');
