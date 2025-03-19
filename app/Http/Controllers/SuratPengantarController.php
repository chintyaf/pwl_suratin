<?php

namespace App\Http\Controllers;

use App\Models\Surat;
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

        $surat = new Surat([
            'id_surat' => $request->surat_id_surat,
            'status' => "Menunggu Persetujuan",
            'nip' => $request->nip,
            'type_surat' => "Surat Pengantar Mata Kuliah"
        ]);
        // return $request;

        $validatedData = validator($request->all(),[
            'surat_id_surat' => 'required|string',
            'ditujukan_kepada' => 'required|string',
            'mata_kuliah' => 'required|string',
            'periode' => 'required|string',
            'nama_anggota_kelompok' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
        ])->validate();

        $surat_pengantar = new SuratPengantar($validatedData);

        $surat->save();
        $surat_pengantar -> save();


        // dd($surat, $surat_pengantar);

        return redirect(route('mhs.dashboard'));

    }
}
