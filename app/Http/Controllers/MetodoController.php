<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodoController extends Controller
{
    public function index()
    {
        return view('metodo.index');
    }
}
