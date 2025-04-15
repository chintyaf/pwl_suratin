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
        $request->validate([
            'ditujukan_kepada' => 'required|string',
            'mata_kuliah' => 'required|string',
            'periode' => 'required|string',
            'nama_anggota_kelompok' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
            'nip' => 'required',
        ]);

        $kodeSurat = 'SPTM'; // Karena ini form khusus Surat Pengantar Tugas MK
        $nip = $request->nip;

        // Cari nomor urut terakhir dengan format yang sama
        $lastSurat = Surat::where('id_surat', 'LIKE', "$kodeSurat-$nip-%")
            ->orderBy('id_surat', 'desc')
            ->first();

        if ($lastSurat) {
            $lastNumber = (int) Str::afterLast($lastSurat->id_surat, '-');
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        $generatedIdSurat = "$kodeSurat-$nip-$newNumber";

        // Buat surat utama
        $surat = new Surat([
            'id_surat' => $generatedIdSurat,
            'status' => "pending",
            'nip' => $nip,
            'type_surat' => "Surat Pengantar Tugas Mata Kuliah",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $surat->save();

        // Buat relasi data Surat Pengantar Tugas MK
        $surat_pengantar = new SuratPengantar([
            'surat_id_surat' => $generatedIdSurat,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'mata_kuliah' => $request->mata_kuliah,
            'periode' => $request->periode,
            'nama_anggota_kelompok' => $request->nama_anggota_kelompok,
            'tujuan' => $request->tujuan,
            'topik' => $request->topik,
        ]);

        $surat_pengantar->save();

        return redirect(route('mhs.dashboard'))->with('success', 'Surat berhasil dibuat dengan nomor: ' . $generatedIdSurat);
    }

//    public function store(Request $request)
//    {
//
//        $surat = new Surat([
//            'id_surat' => $request->surat_id_surat,
//            'status' => "pending",
//            'nip' => $request->nip,
//            'type_surat' => "Surat Pengantar Tugas Mata Kuliah"
//        ]);
//        // return $request;
//
//        $validatedData = validator($request->all(),[
//            'surat_id_surat' => 'required|string',
//            'ditujukan_kepada' => 'required|string',
//            'mata_kuliah' => 'required|string',
//            'periode' => 'required|string',
//            'nama_anggota_kelompok' => 'required|string',
//            'tujuan' => 'required|string',
//            'topik' => 'required|string',
//        ])->validate();
//
//        $surat_pengantar = new SuratPengantar($validatedData);
//
//        $surat->save();
//        $surat_pengantar -> save();
//
//
//        // dd($surat, $surat_pengantar);
//
//        return redirect(route('mhs.dashboard'));
//
//    }


}
