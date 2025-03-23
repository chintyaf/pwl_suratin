<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratKeteranganLulus;
use Illuminate\Http\Request;

class SuratKeteranganLulusController extends Controller
{
    public function create()
    {
        return view('surat_keterangan_lulusCreate');
    }

    public function store(Request $request)
    {
        $suratL= new Surat([
            'id_surat' => $request->surat_id_surat,
            'status' => "Menunggu Persetujuan",
            'nip' => $request->nip,
            'type_surat' => "Surat Keterangan Lulus",
        ]);
//        return $request;

        $validatedData = validator($request->all(), [
            'surat_id_surat' => 'required',
            'tanggal_kelulusan' => 'required',
            'created_at' => now(),
            'updated_at' => now(),
        ])->validate();

        $surat_keterangan_lulus= new SuratKeteranganLulus($validatedData);

        $suratL->save();
        $surat_keterangan_lulus->save();

//        dd($suratL, $surat_keterangan_lulus);

        return redirect(route('mhs.dashboard'));
    }
}
