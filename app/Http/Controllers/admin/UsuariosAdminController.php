<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosAdminController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('admin.UsuariosAdmin', compact('usuarios'));
    }
}
