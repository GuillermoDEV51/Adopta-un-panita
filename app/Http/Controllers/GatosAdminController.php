<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GatosAdminController extends Controller
{
    public function index()
    {
        return view('GatosAdmin');
    }
}
