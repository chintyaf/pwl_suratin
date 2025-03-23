<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{

    public function suratBox(Surat $surat){
        return view('surat.box', compact('surat'));
    }

    // Untuk Kaprodi Setujui /
    public function detailView(Surat $surat)
    {
        if ($surat->type_surat == "Surat Pengantar Tugas Mata Kuliah") {
            $surat->load('suratPengantar');
            $url = 'surat.sp_tugas_mk.detail';
        } else if ($surat->type_surat == "Surat Keterangan Mahasiswa Aktif") {
            $surat->load('suratPengantar');
            $url = 'surat.sk_mhs_aktif.detail';
        } else if ($surat->type_surat == "Surat Keterangan Lulus") {
            $surat->load('suratPengantar');
            $url = 'surat.sk_lulus.detail';
        } else if ($surat->type_surat == "Laporan Hasil Studi") {
            $surat->load('suratPengantar');
            $url = 'surat.lhs.detail';
        } else {
            $url = 'tidak ada';
        }
        // return $surat;
        return view($url)
            ->with('surat', $surat);
    }

    public function updateStatus(Request $request, Surat $surat){
        if($request->status == 'setuju'){
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
}
