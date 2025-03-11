@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">📜 Riwayat Pengajuan & Status Surat</h2>
    
    <!-- Status Summary -->
    {{-- <div class="row text-center mb-4">
        <!-- Individual Status Cards -->
        <div class="col-md-3 mb-3">
            <div class="card card-custom text-white bg-primary p-4">
                <h5>Diproses</h5>
                <h3>3</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-custom text-white bg-success p-4">
                <h5>Selesai</h5>
                <h3>10</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-custom text-white bg-warning p-4">
                <h5>Menunggu ACC</h5>
                <h3>2</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-custom text-white bg-danger p-4">
                <h5>Ditolak</h5>
                <h3>1</h3>
            </div>
        </div>
    </div> --}}

    <!-- Table Riwayat Pengajuan -->
    <div class="card card-custom p-4">
        {{-- <div class="card-header bg-primary text-white">📄 Riwayat Pengajuan Surat</div> --}}
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
                    <tr>
                        <td>Surat Keterangan Mahasiswa Aktif</td>
                        <td>10 Maret 2025</td>
                        <td><span class="badge bg-warning">Menunggu ACC</span></td>
                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSurat1">Lihat</button></td>
                    </tr>
                    <tr>
                        <td>Surat Keterangan Lulus</td>
                        <td>5 Maret 2025</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSurat2">Lihat</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL DETAIL SURAT -->
<!-- Modal #1 -->
<div class="modal fade" id="modalSurat1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">📄 Detail Surat Keterangan Mahasiswa Aktif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal Pengajuan:</strong> 10 Maret 2025</p>
                <p><strong>Status:</strong> <span class="badge bg-warning">Menunggu ACC</span></p>
                <p><strong>Keterangan:</strong> Surat masih dalam tahap persetujuan Kaprodi.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal #2 -->
<div class="modal fade" id="modalSurat2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">📄 Detail Surat Keterangan Lulus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal Pengajuan:</strong> 5 Maret 2025</p>
                <p><strong>Status:</strong> <span class="badge bg-success">Selesai</span></p>
                <p><strong>Keterangan:</strong> Surat telah selesai dan dapat diunduh.</p>
                <a href="#" class="btn btn-success">📥 Unduh Surat</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('ExtraJS')
<script src="{{ asset('js/surat.js') }}"></script>
@endsection