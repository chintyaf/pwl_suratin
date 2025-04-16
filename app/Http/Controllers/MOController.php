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

        // Ambil surat berdasarkan status
        $menunggu = Surat::join('users', 'users.nip', '=', 'surat.nip')
            ->where('surat.status', 'pending')
            ->where('users.id_prodi', $prodi)
            ->orderBy('surat.created_at', 'desc')
            ->get(['surat.*']);

        $diproses = Surat::join('users', 'users.nip', '=', 'surat.nip')
            ->where('surat.status', 'waiting_docs')
            ->where('users.id_prodi', $prodi)
            ->orderBy('surat.created_at', 'desc')
            ->get(['surat.*']);

        $selesai = Surat::join('users', 'users.nip', '=', 'surat.nip')
            ->where('surat.status', 'completed')
            ->where('users.id_prodi', $prodi)
            ->orderBy('surat.created_at', 'desc')
            ->get(['surat.*']);

        $ditolak = Surat::join('users', 'users.nip', '=', 'surat.nip')
            ->where('surat.status', 'rejected')
            ->where('users.id_prodi', $prodi)
            ->orderBy('surat.created_at', 'desc')
            ->get(['surat.*']);

        // Hitung total surat berdasarkan status
        $totalMenunggu = $menunggu->count();
        $totalDiproses = $diproses->count();
        $totalSelesai = $selesai->count();
        $totalDitolak = $ditolak->count();

        return view('mo.index', compact(
            'menunggu',
            'diproses',
            'selesai',
            'ditolak',
            'totalMenunggu',
            'totalDiproses',
            'totalSelesai',
            'totalDitolak'
        ));
    }
}
//
//namespace App\Http\Controllers;
//
//use App\Models\Surat;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class MOController extends Controller
//{
//
//    public function index()
//    {
//        $prodi = Auth::user()->id_prodi;
//
//        $pendingSurat = Surat::join('users', 'users.nip', '=', 'surat.nip')
//            ->where('surat.status', 'pending')
//            ->where('users.id_prodi', $prodi)
//            ->orderBy('surat.created_at', 'desc')
//            ->get(['surat.*']);
//
//        $processingSurat = Surat::join('users', 'users.nip', '=', 'surat.nip')
//            ->where('surat.status', 'waiting_docs')
//            ->where('users.id_prodi', $prodi)
//            ->orderBy('surat.created_at', 'desc')
//            ->get(['surat.*']);
//
//        $completedSurat = Surat::join('users', 'users.nip', '=', 'surat.nip')
//            ->where('surat.status', 'completed')
//            ->where('users.id_prodi', $prodi)
//            ->orderBy('surat.created_at', 'desc')
//            ->get(['surat.*']);
//
//        $receivedSurat = Surat::join('users', 'users.nip', '=', 'surat.nip')
//            ->where('surat.status', 'doc_available')
//            ->where('users.id_prodi', $prodi)
//            ->orderBy('surat.created_at', 'desc')
//            ->get(['surat.*']);
//
//
//        $pendingCount = $pendingSurat->count();
//        $processingCount = $processingSurat->count();
//        $completedCount = $completedSurat->count();
//        $receivedCount = $receivedSurat->count();
//
//        return view(
//            'mo.index',
//            compact(
//                'pendingSurat',
//                'processingSurat',
//                'completedSurat',
//                'receivedSurat',
//                'pendingCount',
//                'processingCount',
//                'completedCount',
//                'receivedCount',
//            )
//        );
//    }
//}
