<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratPengantar;
use App\Models\SuratKeteranganLulus;
use App\Models\LaporanHasilStudi;
use App\Models\SuratKeteranganMahasiswaAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Filesystem\FilesystemAdapter;

class SuratController extends Controller
{

    public function suratBox(Surat $surat)
    {
        return view('surat.box', compact('surat'));
    }

    // Untuk Kaprodi Setujui /
    public function detailView(Surat $surat)
    {
        if ($surat->type_surat == "Surat Pengantar Tugas Mata Kuliah") {
            $surat->load('suratPengantar');
            $url = 'surat.sp_tugas_mk.detail';
        } else if ($surat->type_surat == "Surat Keterangan Mahasiswa Aktif") {
            $surat->load('suratKeteranganMahasiswaAktif');
            $url = 'surat.sk_mhs_aktif.detail';
        } else if ($surat->type_surat == "Surat Keterangan Lulus") {
            $surat->load('suratKeteranganLulus');
            $url = 'surat.sk_lulus.detail';
        } else if ($surat->type_surat == "Laporan Hasil Studi") {
            $surat->load('laporanHasilStudi');
            $url = 'surat.lhs.detail';
        } else {
            $url = 'tidak ada';
        }
        // return $surat;
        return view($url)
            ->with('surat', $surat);
    }

    public function editSurat(Surat $surat)
    {
        if ($surat->type_surat == "Surat Pengantar Tugas Mata Kuliah") {
            $surat->load('suratPengantar');
            $url = 'surat.sp_tugas_mk.edit';
        } else if ($surat->type_surat == "Surat Keterangan Mahasiswa Aktif") {
            $surat->load('suratKeteranganMahasiswaAktif');
            $url = 'surat.sk_mhs_aktif.edit';
        } else if ($surat->type_surat == "Surat Keterangan Lulus") {
            $surat->load('suratKeteranganLulus');
            $url = 'surat.sk_lulus.edit';
        } else if ($surat->type_surat == "Laporan Hasil Studi") {
            $surat->load('laporanHasilStudi');
            $url = 'surat.lhs.edit';
        } else {
            $url = 'tidak ada';
        }
        // return $surat;
        return view($url)
            ->with('surat', $surat);
    }

    public function updateStatus(Request $request, Surat $surat)
    {
        if ($request->status == 'setuju') {
            $surat['status'] = "waiting_docs";
            $msg = "Surat disetujui";
        } else {
            $surat['status'] = "rejected";
            $msg = "Surat ditolak";
        }
        $surat->save();
        return redirect()->back()
            ->with('status', $msg);
    }

    public function uploadSurat(Request $request, Surat $surat)
    {
        $request->validate([
            'dokumen' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('dokumen');

        if (!$file) {
            return back()->with('error', 'File not received.');
        }

        $extension = $file->getClientOriginalExtension(); // Get file extension

        $fileName = $surat->id_surat . '.' . $extension;
        $path = storage_path('app/public/surat');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $fileName); // Move file manually

        $surat['status'] = "doc_available";
        $surat->save();

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }


    public function viewSurat(Surat $surat)
    {
        // Get the file path
        $filePath = "surat/{$surat->id_surat}.pdf"; // Adjust based on stored file extension

        // Check if file exists in storage
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Get full file path
        $fullPath = Storage::disk('public')->path($filePath);

        // Return file response for viewing
        return response()->file($fullPath);
    }

    public function downloadSurat(Surat $surat)
    {
        // Define the file path inside storage
        $filePath = storage_path("app/public/surat/{$surat->id_surat}.pdf");

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Return the file as a downloadable response
        return response()->download($filePath, "{$surat->id_surat}.pdf");
    }


    public function edit($id)
    {
        $surat = Surat::with(['getNIP', 'suratKeteranganMahasiswaAktif', 'suratPengantar'])->findOrFail($id);
        return view('surat.edit', compact('surat'));
//        $surat = Surat::findOrFail($id);
//        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = Surat::with(['suratKeteranganMahasiswaAktif', 'suratPengantar'])->findOrFail($id);

        // Cek jenis surat
        if ($surat->type_surat === 'Surat Keterangan Mahasiswa Aktif') {
            $validated = $request->validate([
                'periode' => 'required|string',
                'alamat_bandung' => 'required|string',
                'keperluan_pengajuan' => 'required|string',
            ]);

            $surat->suratKeteranganMahasiswaAktif->update($validated);
        }

        elseif ($surat->type_surat === 'Surat Pengantar Tugas') {
            $validated = $request->validate([
                'ditujukan_kepada' => 'required|string',
                'mata_kuliah' => 'required|string',
                'periode' => 'required|string',
                'nama_anggota_kelompok' => 'required|string',
                'topik' => 'required|string',
                'tujuan' => 'required|string',
            ]);

            $surat->suratPengantar->update($validated);
        }

        return redirect()->route('mhs.dashboard')->with('success', 'Data surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('mhs.dashboard')->with('success', 'Surat berhasil dihapus.');
    }

    public function unduh($id)
    {
        $surat = Surat::findOrFail($id);

        // Misal dokumen disimpan di: storage/app/public/surat/filename.pdf
        $filePath = 'surat/' . $surat->file_name;

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }

        return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
    }

}
