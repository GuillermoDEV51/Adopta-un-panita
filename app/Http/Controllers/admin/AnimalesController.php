<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Especie;

class AnimalesController extends Controller
{
    public function show()
    {
        $mascotas = Mascotas::all();
        $especies = Especie::all();
        return view('admin.AnimalesAdmin' , compact('mascotas', 'especies'));
    }
}
