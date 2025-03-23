<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class MOController extends Controller
{

    public function index()
    {
        $menunggu = Surat::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $diproses = Surat::where('status', 'waiting_docs')->orderBy('created_at', 'desc')->get();
        $selesai = Surat::where('status', 'completed')->orderBy('created_at', 'desc')->get();
        $ditolak = Surat::where('status', 'rejected')->orderBy('created_at', 'desc')->get();

        $totalMenunggu = $menunggu->count();
        $totalDiproses = $diproses->count();
        $totalSelesai = $selesai->count();
        $totalDitolak = $ditolak->count();

        return view(
            'mo.index',
            compact(
                'menunggu',
                'totalMenunggu',
                'diproses',
                'totalDiproses',
                'selesai',
                'totalSelesai',
                'ditolak',
                'totalDitolak'
            )
        );
    }
}
