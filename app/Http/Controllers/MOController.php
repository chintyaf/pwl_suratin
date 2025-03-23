<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class MOController extends Controller
{

    public function index()
    {
        $pendingSurat = Surat::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $processingSurat = Surat::where('status', 'waiting_docs')->orderBy('created_at', 'desc')->get();
        $completedSurat = Surat::where('status', 'doc_available')->orderBy('created_at', 'desc')->get();
        $receivedSurat = Surat::where('status', 'doc_available')->orderBy('created_at', 'desc')->get();

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
