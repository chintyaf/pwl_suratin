<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;

class KaprodiController extends Controller
{
    public function index()
    {
        $prodi = Auth::user()->id_prodi;

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


        $totalMenunggu = $menunggu->count();
        $totalDiproses = $diproses->count();
        $totalSelesai = $selesai->count();
        $totalDitolak = $ditolak->count();

        // dd(            compact(
        //     'menunggu' ?? [],
        //     'totalMenunggu',
        //     'diproses' ?? [],
        //     'totalDiproses',
        //     'selesai' ?? [],
        //     'totalSelesai',
        //     'ditolak' ?? [],
        //     'totalDitolak'
        // ));

        return view(
            'kaprodi.index',
            compact(
                'menunggu' ?? [],
                'totalMenunggu',
                'diproses' ?? [],
                'totalDiproses',
                'selesai' ?? [],
                'totalSelesai',
                'ditolak' ?? [],
                'totalDitolak'
            )
        );
    }
}
