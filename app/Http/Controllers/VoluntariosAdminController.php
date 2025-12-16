<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoluntariosAdminController extends Controller
{
    public function index()
    {
        return view('VoluntariosAdmin');
    }
}
