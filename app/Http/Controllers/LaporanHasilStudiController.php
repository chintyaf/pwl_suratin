<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Surat;
use App\Models\LaporanHasilStudi;
use App\Models\User;
use App\Notifications\SendNotif;
use App\Notifications\SuratSubmitted;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanHasilStudiController extends Controller
{
    public function create()
    {
        return view('laporan_hasil_studiCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keperluan_pembuatan' => 'required|string',
            'nip' => 'required',
        ]);

        $kodeSurat = 'LHST'; // Karena ini form khusus Laporan Hasil Studi
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
            'type_surat' => "Laporan Hasil Studi",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $surat->save();

        // Buat relasi data Laporan Hasil Studi
        $laporan_hasil_studi = new LaporanHasilStudi([
            'surat_id_surat' => $generatedIdSurat,
            'keperluan_pembuatan' => $request->keperluan_pembuatan,
        ]);

        $laporan_hasil_studi->save();

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
