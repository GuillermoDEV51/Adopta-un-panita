<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosAdminController extends Controller
{
    public function index()
    {
        return view('UsuariosAdmin');
    }
}
