<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $nip = Auth::user()->nip;

        $menunggu = Surat::where('nip', $nip)->where('status', 'pending')->count();
        $diproses = Surat::where('nip', $nip)->where('status', 'waiting_docs')->count();
        $selesai  = Surat::where('nip', $nip)->where('status', 'doc_available')->count();
        $ditolak  = Surat::where('nip', $nip)->where('status', 'rejected')->count();

//        $menunggu = Surat::where('nip', $nip)->where('status', 'Menunggu Persetujuan')->count();
//        $diproses = Surat::where('nip', $nip)->where('status', 'Disetujui - Menunggu Dokumen')->count();
//        $selesai = Surat::where('nip', $nip)->where('status', 'Selesai')->count();
//        $ditolak = Surat::where('nip', $nip)->where('status', 'Ditolak')->count();

        $surats = Surat::where('nip', $nip)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('mhs.index', compact('menunggu', 'diproses', 'selesai', 'ditolak'))->with('surats', $surats);

    }

    public function history(){
        $nip = Auth::user()->nip;

        $surats = Surat::where('nip', $nip)->get();

        return view('mhs.history')->with('surats', $surats);
    }
}
