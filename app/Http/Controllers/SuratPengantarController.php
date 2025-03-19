<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPengantar;

class SuratPengantarController extends Controller
{
    /**
     * Show the form for creating a new Surat Pengantar.
     */
    public function create()
    {
        return view('surat_pengantarCreate');
    }

    /**
     * Store a newly created Surat Pengantar in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(),[
            'ditujukan_kepada' => 'required|string',
            'mata_kuliah' => 'required|string',
            'periode' => 'required|string',
            'nama_anggota_kelompok' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
            'nip' => 'required|string', // Validasi NIP juga
        ])->validate();
        $surat_pengantar = new SuratPengantar($validatedData);
        $surat_pengantar -> save();

        return redirect(route('mhs.dashboard'));

    }
}
