<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\SuratKeteranganMahasiswaAktif;

class SuratKeteranganMahasiswaAktifController extends Controller
{
    /**
     * Show the form for creating a new Surat Keterangan Mahasiswa Aktif.
     */
    public function create()
    {
        return view('surat_keterangan_mahasiswa_aktifCreate');
    }

    /**
     * Store a newly created Surat Keterangan Mahasiswa Aktif in storage.
     */
    public function store(Request $request)
    {

        $surat = new Surat([
            'id_surat' => $request->surat_id_surat,
            'status' => "pending",
            'nip' => $request->nip,
            'type_surat' => "Surat Keterangan Mahasiswa Aktif",
        ]);
        // return $request;

        $validatedData = validator($request->all(),[
            'surat_id_surat' => 'required|string',
            'periode' => 'required|string',
            'alamat_bandung' => 'required|string',
            'keperluan_pengajuan' => 'required|string',
            'created_at' => now(),
            'updated_at' => now(),
        ])->validate();

        $skma = new SuratKeteranganMahasiswaAktif($validatedData);

        $surat->save();
        $skma-> save();


//        dd($surat, $skma);

        return redirect(route('mhs.dashboard'));
    }

    public function show($id)
    {
        $surat = Surat::with('suratKeteranganMahasiswaAktif')->findOrFail($id);
        return view('detail_surat', compact('surat'));
    }

}
