@extends('layouts.index')
{{-- @extends('mhs.mahasiswa') --}}
@section('content')

<div class="container mt-4">
    <!-- Welcome Message -->
    <div class="mb-4 text-center">
        <h2>Selamat Datang, Mahasiswa!</h2>
        <p class="text-muted">Kelola pengajuan surat akademik Anda dengan mudah.</p>
    </div>

    <!-- Row 1: Ringkasan -->
    <div class="row">
        @php
        $cards = [
            ['title' => 'Menunggu persetujuan', 'count' => $menunggu, 'color' => '#fcfdff', 'txt-color' => '#13879b', 'modal' => 'modalDiproses'],
            ['title' => 'Disetujui - Menunggu Dokumen', 'count' => $diproses, 'color' => '#fff7e8', 'txt-color' => '#faad14 ', 'modal' => 'modalMenunggu'],
            ['title' => 'Selesai', 'count' => $selesai, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'],
            ['title' => 'Ditolak', 'count' => $ditolak, 'color' => '#ffeded', 'txt-color' => '#ff4d4f', 'modal' => 'modalDitolak'],
        ];
    @endphp

    <div class="d-flex">
        @foreach ($cards as $card)
            <div class="px-2 col-3">
                <div class="mb-4 text-white card" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">
                    <div style="background-color:{{ $card['color'] }}"
                        class="text-center card-header status">
                        <h5 style="color:{{ $card['txt-color'] }};font-size: 16px" class="m-0 card-title">{{ $card['title'] }}</h5>
                    </div>
                    <div class="text-center card-body">
                        <h3 style="font-weight: 800">{{ $card['count'] }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Row 2: Tombol Ajukan Surat -->
    <div class="my-4 text-center">
        <button type="button" class="btn btn-primary btn-hover-active" id="btnAjukanSurat"
            data-bs-toggle="popover" data-bs-html="true" data-bs-placement="bottom">
            + Ajukan Surat Baru
        </button>
    </div>


    <!-- Row 3: Riwayat Pengajuan & Notifikasi -->
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="px-3 py-2 mb-0 card-title">Riwayat Pengajuan Surat Terbaru</h5>
                </div>
                <div class="px-4 pb-4">
                    <table class="table p-2 my-0 table-hover">
                        <thead>
                            <tr>
                                <th>Jenis Surat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Dokumen</th>
                                <th>Detil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $surat)
                            <tr>
                                <td>{{ $surat->type_surat }}</td>
                                <td>{{ $surat->created_at }}</td>
                                <td>
                                    {{-- <span class="badge bg-success">Selesai</span> --}}
                                    {{ $surat->status }}
                                </td>
                                <td>{{ $surat->dokumen?? 'Tidak ada Dokumen' }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat2">Lihat</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Notifikasi -->
        {{-- <div class="col-md-4">
            <div class="mb-4 card">
                <div class="text-white card-header bg-secondary">Notifikasi</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Surat Keterangan Lulus telah selesai</li>
                        <li class="list-group-item">Surat Keterangan Mahasiswa Aktif menunggu ACC</li>
                        <li class="list-group-item">Surat Pengantar Tugas sedang diproses</li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div>

<!-- MODAL DETAIL SURAT -->
@foreach ([
    'modalSurat1' => ['title' => 'Detail Surat Keterangan Mahasiswa Aktif', 'date' => '10 Maret 2025', 'status' => 'Menunggu ACC'],
    'modalSurat2' => ['title' => 'Detail Surat Keterangan Lulus', 'date' => '5 Maret 2025', 'status' => 'Selesai'],
] as $id => $data)
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $data['title'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal Pengajuan:</strong> {{ $data['date'] }}</p>
                <p><strong>Status:</strong> <span class="badge bg-warning">{{ $data['status'] }}</span></p>
                @if($id == 'modalSurat2')
                    <p><strong>Keterangan:</strong> Surat telah selesai dan dapat diunduh.</p>
                    <a href="#" class="btn btn-success">Unduh Surat</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('ExtraJS')
<script>
document.addEventListener("DOMContentLoaded", function() {
    var btn = document.getElementById('btnAjukanSurat');

    if (btn) {
        var popover = new bootstrap.Popover(btn, {
            html: true,
            content: `
                <div class="list-group">
                    <a href="{{ route('form-sk-mhs-aktif') }}" class="list-group-item list-group-item-action">Surat Keterangan Mahasiswa Aktif</a>
                    <a href="{{ route('form-sp-tugas-mk') }}" class="list-group-item list-group-item-action">Surat Pengantar Tugas Mata Kuliah</a>
                    <a href="{{ route('form-sk-lulus') }}" class="list-group-item list-group-item-action">Surat Keterangan Lulus</a>
                    <a href="{{ route('form-lhs') }}" class="list-group-item list-group-item-action">Laporan Hasil Studi</a>
                </div>
            `,
            trigger: 'manual', // Memastikan popover dibuka & ditutup manual
            placement: 'bottom',
            container: 'body',
            sanitize: false
        });

        btn.addEventListener("click", function() {
            popover.toggle(); // Toggle popover saat tombol diklik
        });

        // Event listener untuk menutup popover saat klik di luar
        document.addEventListener("click", function(e) {
            if (!btn.contains(e.target) && !document.querySelector('.popover')?.contains(e.target)) {
                popover.hide();
            }
        });
    } else {
        console.error("Element #btnAjukanSurat tidak ditemukan.");
    }
});



</script>
@endsection