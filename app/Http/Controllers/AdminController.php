<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $person = 'Chintya';
        $friends = ['Brig', 'Nat', 'Cipuh'];

        return view('admin.index');
    }
}
