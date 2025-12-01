<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Login Route
Route::get('/login', [LoginController::class, 'index']);



// Register Route

Route::get('/register', [RegistroController::class, 'index'])->name('register');