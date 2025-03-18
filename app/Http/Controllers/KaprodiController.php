<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    public function index()
    {
        // $surat = DB("SELECT * FROM surat WHERE status = ?", ['menunggu']);

        return view('kaprodi.index');
    }
}
