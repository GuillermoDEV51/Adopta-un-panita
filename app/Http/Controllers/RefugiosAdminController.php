<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefugiosAdminController extends Controller
{
    public function index()
    {
        return view('RefugiosAdmin');
    }
}
