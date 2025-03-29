<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MOController extends Controller
{

    public function index()
    {
        $prodi = Auth::user()->id_prodi;

        $pendingSurat = Surat::where('id_prodi', $prodi)->where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $processingSurat = Surat::where('id_prodi', $prodi)->where('status', 'waiting_docs')->orderBy('created_at', 'desc')->get();
        $completedSurat = Surat::where('id_prodi', $prodi)->where('status', 'doc_available')->orderBy('created_at', 'desc')->get();
        $receivedSurat = Surat::where('id_prodi', $prodi)->where('status', 'doc_available')->orderBy('created_at', 'desc')->get();

        $pendingCount = $pendingSurat->count();
        $processingCount = $processingSurat->count();
        $completedCount = $completedSurat->count();
        $receivedCount = $receivedSurat->count();

        return view(
            'mo.index',
            compact(
                'pendingSurat',
                'pendingCount',
                'processingSurat',
                'processingCount',
                'completedSurat',
                'completedCount',
                'receivedSurat',
                'receivedCount'
            )
        );
    }
}
