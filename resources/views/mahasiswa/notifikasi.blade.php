@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container mt-4">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2>🔔 Notifikasi Mahasiswa</h2>
        <p class="text-muted">Lihat semua pemberitahuan terkait pengajuan surat Anda.</p>
    </div>

    <!-- Notifikasi List -->
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            📢 Daftar Notifikasi
        </div>
        <div class="card-body">

            <!-- Notifikasi 1 -->
            <div class="notification-item">
                <div class="icon success">✅</div>
                <div>
                    <strong>Surat Keterangan Lulus telah selesai!</strong>
                    <p class="text-muted small">Silakan unduh surat Anda. (11 Maret 2025)</p>
                </div>
            </div>

            <!-- Notifikasi 2 -->
            <div class="notification-item">
                <div class="icon warning">⏳</div>
                <div>
                    <strong>Surat Pengantar Tugas masih menunggu ACC Kaprodi.</strong>
                    <p class="text-muted small">Mohon bersabar, permintaan sedang diproses. (9 Maret 2025)</p>
                </div>
            </div>

            <!-- Notifikasi 3 -->
            <div class="notification-item">
                <div class="icon info">📌</div>
                <div>
                    <strong>Surat Keterangan Mahasiswa Aktif sedang dibuat oleh MO.</strong>
                    <p class="text-muted small">Surat Anda akan segera tersedia. (8 Maret 2025)</p>
                </div>
            </div>

            <!-- Notifikasi 4 -->
            <div class="notification-item">
                <div class="icon success">✅</div>
                <div>
                    <strong>Surat Laporan Hasil Studi telah selesai dibuat.</strong>
                    <p class="text-muted small">Silakan cek dan unduh surat Anda. (7 Maret 2025)</p>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('ExtraJS')
<script src="{{ asset('js/surat.js') }}"></script>

@endsection