<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\SuratKeteranganMahasiswaAktif;
use App\Models\User;
use App\Notifications\SendNotif;
use Illuminate\Support\Str;


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
        $request->validate([
            'periode' => 'required|string',
            'alamat_bandung' => 'required|string',
            'keperluan_pengajuan' => 'required|string',
            'nip' => 'required',
        ]);

        $kodeSurat = 'SKMA'; // Karena ini form khusus SKMA
        $nip = $request->nip;

        // Cari nomor urut terakhir dengan format yang sama
        $lastSurat = Surat::where('id_surat', 'LIKE', "$kodeSurat-$nip-%")
            ->orderBy('id_surat', 'desc')
            ->first();

        $subject = "some-string-search-12345";
        if ($lastSurat) {
            // $lastNumber = (int) Str::afterLast(Str::afterLast($subject, 'search'), '-');
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
            'type_surat' => "Surat Keterangan Mahasiswa Aktif",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $surat->save();

        // Buat relasi data Surat Keterangan Mahasiswa Aktif
        $skma = new SuratKeteranganMahasiswaAktif([
            'surat_id_surat' => $generatedIdSurat,
            'periode' => $request->periode,
            'alamat_bandung' => $request->alamat_bandung,
            'keperluan_pengajuan' => $request->keperluan_pengajuan,
        ]);

        $skma->save();

        $mhs = User::findOrFail($request->nip);

        $kaprodi = User::where('id_role', '1')
        ->where('id_prodi', $mhs->id_prodi)
        ->first();

        $kaprodi->notify(new SendNotif("Pengajuan Surat Baru",
         $mhs->name . " telah mengajukan surat dan menunggu persetujuan Anda."));

         $mhs->notify(new SendNotif("Pengajuan Surat Baru",
         $generatedIdSurat . " telah berhasil diajukan."));

        return redirect(route('mhs.dashboard'))->with('success', 'Surat berhasil dibuat dengan nomor: ' . $generatedIdSurat);
    }

//    public function store(Request $request)
//    {
//
//        $surat = new Surat([
//            'id_surat' => $request->surat_id_surat,
//            'status' => "pending",
//            'nip' => $request->nip,
//            'type_surat' => "Surat Keterangan Mahasiswa Aktif",
//        ]);
//        // return $request;
//
//        $validatedData = validator($request->all(),[
//            'surat_id_surat' => 'required|string',
//            'periode' => 'required|string',
//            'alamat_bandung' => 'required|string',
//            'keperluan_pengajuan' => 'required|string',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ])->validate();
//
//        $skma = new SuratKeteranganMahasiswaAktif($validatedData);
//
//        $surat->save();
//        $skma-> save();
//
//
////        dd($surat, $skma);
//
//        return redirect(route('mhs.dashboard'));
//    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'periode' => 'required|string',
            'alamat_bandung' => 'required|string',
            'keperluan_pengajuan' => 'required|string',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->suratKeteranganMahasiswaAktif) {
            $surat->suratKeteranganMahasiswaAktif->update($validatedData);
        } else {
            $surat->suratKeteranganMahasiswaAktif()->create($validatedData);
        }

        return redirect()->route('mhs.dashboard')->with('status', 'Data surat berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id_surat');
        $surat = Surat::findOrFail($id);

        if ($surat->suratKeteranganMahasiswaAktif) {
            $surat->suratKeteranganMahasiswaAktif->delete();
        }

        $surat->delete();

        return redirect()->route('mhs.dashboard')->with('status', 'Surat berhasil dihapus.');
    }

    public function show($id)
    {
        $surat = Surat::with('suratKeteranganMahasiswaAktif')->findOrFail($id);
        return view('detail_surat', compact('surat'));
    }

}
