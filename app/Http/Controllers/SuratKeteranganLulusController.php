<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratKeteranganLulus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratKeteranganLulusController extends Controller
{
    public function create()
    {
        return view('surat_keterangan_lulusCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_kelulusan' => 'required',
            'nip' => 'required',
        ]);

        $kodeSurat = 'SKLU'; // Karena ini form khusus SKLU
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
            'type_surat' => "Surat Keterangan Lulus",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $surat->save();

        // Buat relasi data Surat Keterangan Lulus
        $surat_keterangan_lulus = new SuratKeteranganLulus([
            'surat_id_surat' => $generatedIdSurat,
            'tanggal_kelulusan' => $request->tanggal_kelulusan,
        ]);

        $surat_keterangan_lulus->save();

        return redirect(route('mhs.dashboard'))->with('success', 'Surat berhasil dibuat dengan nomor: ' . $generatedIdSurat);
    }

//    public function store(Request $request)
//    {
//        $suratL= new Surat([
//            'id_surat' => $request->surat_id_surat,
//            'status' => "pending",
//            'nip' => $request->nip,
//            'type_surat' => "Surat Keterangan Lulus",
//        ]);
////        return $request;
//
//        $validatedData = validator($request->all(), [
//            'surat_id_surat' => 'required',
//            'tanggal_kelulusan' => 'required',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ])->validate();
//
//        $surat_keterangan_lulus= new SuratKeteranganLulus($validatedData);
//
//        $suratL->save();
//        $surat_keterangan_lulus->save();
//
////        dd($suratL, $surat_keterangan_lulus);
//
//        return redirect(route('mhs.dashboard'));
//    }
}
