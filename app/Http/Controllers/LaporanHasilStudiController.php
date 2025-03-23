<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\LaporanHasilStudi;
use Illuminate\Http\Request;

class LaporanHasilStudiController extends Controller
{
    public function create()
    {
        return view('laporan_hasil_studiCreate');
    }

    public function store(Request $request)
    {

        $surat = new Surat([
            'id_surat' => $request->surat_id_surat,
            'status' => "Menunggu Persetujuan",
            'nip' => $request->nip,
            'type_surat' => "Laporan Hasil Studi",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // return $request;

        $validatedData = validator($request->all(),[
            'surat_id_surat' => 'required|string',
            'keperluan_pembuatan' => 'required|string',
        ])->validate();

        $laporan_hasil_studi = new LaporanHasilStudi($validatedData);

        $surat->save();
        $laporan_hasil_studi -> save();


        // dd($surat, $surat_pengantar);

        return redirect(route('mhs.dashboard'));

    }
}
