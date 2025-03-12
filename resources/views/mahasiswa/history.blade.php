@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Riwayat Pengajuan & Status Surat</h2>
    
    <!-- Table Riwayat Pengajuan -->
    <div class="card card-custom p-4">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Jenis Surat</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $suratList = [
                            ['jenis' => 'Surat Keterangan Mahasiswa Aktif', 'tanggal' => '10 Maret 2025', 'status' => 'Diproses', 'badge' => 'warning'],
                            ['jenis' => 'Surat Keterangan Lulus', 'tanggal' => '5 Maret 2025', 'status' => 'Selesai', 'badge' => 'success'],
                            ['jenis' => 'Surat Pengantar Tugas', 'tanggal' => '12 Februari 2025', 'status' => 'Ditolak', 'badge' => 'danger'],
                            ['jenis' => 'Surat Laporan Hasil Studi', 'tanggal' => '20 Januari 2025', 'status' => 'Selesai', 'badge' => 'success'],
                            ['jenis' => 'Surat Cuti Akademik', 'tanggal' => '18 Maret 2025', 'status' => 'Diproses', 'badge' => 'warning'],
                            ['jenis' => 'Surat Rekomendasi Beasiswa', 'tanggal' => '2 Februari 2025', 'status' => 'Ditolak', 'badge' => 'danger'],
                        ];
                    @endphp
                    
                    @foreach($suratList as $index => $surat)
                        <tr>
                            <td>{{ $surat['jenis'] }}</td>
                            <td>{{ $surat['tanggal'] }}</td>
                            <td><span class="badge bg-{{ $surat['badge'] }}">{{ $surat['status'] }}</span></td>
                            <td>
                                <button class="btn btn-primary btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="{{ $surat['status'] == 'Selesai' ? '#modalSelesai' : ($surat['status'] == 'Ditolak' ? '#modalDitolak' : '#modalDiproses') }}" 
                                    data-jenis="{{ $surat['jenis'] }}" 
                                    data-tanggal="{{ $surat['tanggal'] }}" 
                                    data-status="{{ $surat['status'] }}">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL DETAIL SURAT -->
<!-- Modal Diproses -->
<div class="modal fade" id="modalDiproses" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">📄 Detail Surat Diproses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Jenis Surat:</strong> <span id="modalDiprosesJenis"></span></p>
                <p><strong>Tanggal Pengajuan:</strong> <span id="modalDiprosesTanggal"></span></p>
                <p><strong>Status:</strong> <span id="modalDiprosesStatus"></span></p>
                <p><strong>Keterangan:</strong> Surat masih dalam tahap proses.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ditolak -->
<div class="modal fade" id="modalDitolak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">📄 Detail Surat Ditolak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Jenis Surat:</strong> <span id="modalDitolakJenis"></span></p>
                <p><strong>Tanggal Pengajuan:</strong> <span id="modalDitolakTanggal"></span></p>
                <p><strong>Status:</strong> <span class="badge bg-danger">Ditolak</span></p>
                <p><strong>Keterangan:</strong> Pengajuan surat telah ditolak.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Selesai -->
<div class="modal fade" id="modalSelesai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">📄 Detail Surat Selesai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Jenis Surat:</strong> <span id="modalSelesaiJenis"></span></p>
                <p><strong>Tanggal Pengajuan:</strong> <span id="modalSelesaiTanggal"></span></p>
                <p><strong>Status:</strong> <span class="badge bg-success">Selesai</span></p>
                <p><strong>Keterangan:</strong> Surat telah selesai dan dapat diunduh.</p>
                <a href="#" class="btn btn-success">Unduh Surat</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('ExtraJS')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modals = ['modalDiproses', 'modalDitolak', 'modalSelesai'];
        modals.forEach(function(modalId) {
            var modal = document.getElementById(modalId);
            modal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                document.getElementById(modalId + 'Jenis').innerText = button.getAttribute('data-jenis');
                document.getElementById(modalId + 'Tanggal').innerText = button.getAttribute('data-tanggal');
            });
        });
    });
</script>
@endsection
