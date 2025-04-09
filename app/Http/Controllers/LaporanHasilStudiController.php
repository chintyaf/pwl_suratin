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
            'status' => "pending",
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

    public function update(Request $request, $id)
    {
        // Validasi hanya untuk keperluan_pembuatan
        $validatedData = $request->validate([
            'keperluan_pembuatan' => ['required', 'string', 'max:1000'],
        ]);

        // Ambil surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Pastikan relasi Laporan Hasil Studi ada
        if ($surat->laporanHasilStudi) {
            $surat->laporanHasilStudi->keperluan_pembuatan = $validatedData['keperluan_pembuatan'];
            $surat->laporanHasilStudi->save();
        } else {
            // Kalau belum ada, buat baru
            $surat->laporanHasilStudi()->create([
                'keperluan_pembuatan' => $validatedData['keperluan_pembuatan']
            ]);
        }

        return redirect()->route('mhs.dashboard')
            ->with('status', 'Keperluan pembuatan berhasil diupdate.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id_surat');

        $surat = Surat::findOrFail($id);

        // Hapus relasi laporan hasil studi
        if ($surat->laporanHasilStudi) {
            $surat->laporanHasilStudi->delete();
        }

        // Hapus surat utama
        $surat->delete();

        return redirect()->route('mhs.dashboard')->with('status', 'Surat berhasil dihapus.');
    }

}
