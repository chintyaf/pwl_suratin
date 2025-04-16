<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\SuratPengantar;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\SendNotif;

class SuratPengantarController extends Controller
{

    public function create()
    {
        $prodi = Auth::user()->id_prodi;

        $mk = MataKuliah::where('id_prodi', $prodi)->get();

        return view('surat.sp_tugas_mk.form-surat-pengantar',
        [
            'mk' => $mk,
        ]);
    }

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

        $kodeSurat = 'SPTM'; // Kode untuk Surat Pengantar Tugas MK
        $nip = $request->nip;

        $lastSurat = Surat::where('id_surat', 'LIKE', "$kodeSurat-$nip-%")
            ->orderBy('id_surat', 'desc')
            ->first();

        $newNumber = $lastSurat
            ? str_pad(((int) Str::afterLast($lastSurat->id_surat, '-')) + 1, 3, '0', STR_PAD_LEFT)
            : '001';

        $generatedIdSurat = "$kodeSurat-$nip-$newNumber";

        $surat = new Surat([
            'id_surat' => $generatedIdSurat,
            'status' => 'pending',
            'nip' => $nip,
            'type_surat' => 'Surat Pengantar Tugas Mata Kuliah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $surat->save();

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



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ditujukan_kepada' => 'required|string',
            'mata_kuliah' => 'required|string',
            'periode' => 'required|string',
            'nama_anggota_kelompok' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->suratPengantar) {
            $surat->suratPengantar->update($validatedData);
        } else {
            $surat->suratPengantar()->create($validatedData);
        }

        return redirect()->route('mhs.dashboard')->with('status', 'Data surat berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id_surat');
        $surat = Surat::findOrFail($id);

        if ($surat->suratPengantar) {
            $surat->suratPengantar->delete();
        }

        $surat->delete();

        return redirect()->route('mhs.dashboard')->with('status', 'Surat berhasil dihapus.');
    }

    public function show($id)
    {
        $surat = Surat::with('suratPengantar')->findOrFail($id);
        return view('detail_surat', compact('surat'));
    }
}
