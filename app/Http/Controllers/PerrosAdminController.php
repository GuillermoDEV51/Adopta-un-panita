<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerrosAdminController extends Controller
{
    public function index()
    {
        return view('PerrosAdmin');
    }
}
