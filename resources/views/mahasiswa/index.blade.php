@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container mt-4">
    <!-- Welcome Message -->
    <div class="text-center mb-4">
        <h2>🎓 Selamat Datang, Mahasiswa!</h2>
        <p class="text-muted">Kelola pengajuan surat akademik Anda dengan mudah.</p>
    </div>

    <!-- Row 1: Ringkasan -->
    <div class="row">
        @php
            $cards = [
                ['title' => 'Surat Diproses', 'count' => 3, 'color' => 'primary', 'modal' => 'modalDiproses'],
                ['title' => 'Surat Selesai', 'count' => 10, 'color' => 'success', 'modal' => 'modalSelesai'],
                ['title' => 'Menunggu ACC', 'count' => 2, 'color' => 'warning', 'modal' => 'modalMenunggu'],
                ['title' => 'Ditolak', 'count' => 1, 'color' => 'danger', 'modal' => 'modalDitolak'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-md-3">
                <div class="card text-white bg-{{ $card['color'] }} mb-4" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $card['title'] }}</h5>
                        <h3>{{ $card['count'] }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Row 2: Tombol Ajukan Surat -->
    <div class="text-center my-4">
        <a href="#" class="btn btn-primary">+ Ajukan Surat Baru</a>
    </div>

    <!-- Row 3: Riwayat Pengajuan & Notifikasi -->
    <div class="row">
        <!-- Riwayat Pengajuan -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">📄 Riwayat Pengajuan Surat</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Jenis Surat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Surat Keterangan Mahasiswa Aktif</td>
                                <td>10 Maret 2025</td>
                                <td><span class="badge bg-warning">Menunggu ACC</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat1">Lihat</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Surat Keterangan Lulus</td>
                                <td>5 Maret 2025</td>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat2">Lihat</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">🔔 Notifikasi</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">✅ Surat Keterangan Lulus telah selesai</li>
                        <li class="list-group-item">📌 Surat Keterangan Mahasiswa Aktif menunggu ACC</li>
                        <li class="list-group-item">⏳ Surat Pengantar Tugas sedang diproses</li>
                    </ul>
                </div>
            </div>
        </div>
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
                    <a href="#" class="btn btn-success">💽 Unduh Surat</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('ExtraJS')
<script src="{{ asset('js/surat.js') }}"></script>
@endsection