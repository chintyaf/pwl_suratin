<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MOController extends Controller
{

    public function index()
    {
        return view('mo.index');
    }
}
