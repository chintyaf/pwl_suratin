<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Filesystem\FilesystemAdapter;
use App\Models\SuratPengantar;
use App\Models\SuratKeteranganLulus;
use App\Models\LaporanHasilStudi;
use App\Models\SuratKeteranganMahasiswaAktif;


class SuratController extends Controller
{

    public function suratBox(Surat $surat)
    {
        return view('surat.box', compact('surat'));
    }

    // Untuk Kaprodi / MO
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
            // Please change
            $url = 'tidakada';
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
}
