<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudesAdminController extends Controller
{
    public function index()
    {
        return view('SolicitudesAdmin');
    }
}
