@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('surat_pengantarStore') }}">
        @csrf

        <input type="hidden" id="nip" name="nip" value = "{{ auth()->user()->nip }}">
{{--        <input type="text" id="surat_id_surat" name="surat_id_surat" value = "Surat002">--}}
        <div class="mb-3">
            <h1 class="align-middle d-inline">Pengajuan Surat Pengantar Tugas Mata Kuliah</h1>
            <p class="text-muted">Silakan isi data berikut untuk mengajukan surat pengantar tugas mata kuliah.</p>
        </div>

        <div class="mb-3">
            <label for="ditujukan_kepada" class="form-label">Surat Ditujukan Kepada</label>
            <p class="text-muted">Nama, jabatan, perusahaan, dan alamat (contoh: Ibu Susi Susanti; Kepala Personalia PT. X; Jln. Cibogo no. 10 Bandung)</p>
            <input type="text" id="ditujukan_kepada" name="ditujukan_kepada" class="form-control" placeholder="Masukkan informasi lengkap" required>
        </div>

        <div class="mb-3">
            <label for="mata_kuliah" class="form-label fw-bold">Nama Mata Kuliah - Kode Mata Kuliah</label>
            <div class="dropdown w-100">
                <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="dropdownDisplay">Pilih Mata Kuliah</span>
                </button>

                <div class="p-2 dropdown-menu w-100">
                    <input type="text" class="mb-2 form-control" id="searchInput" placeholder="Cari Mata Kuliah">
                    <ul class="mb-0 list-unstyled" id="dropdownList">
                        @foreach ($mk as $mk)
                        <li><a class="dropdown-item">{{ $mk->nama_formatted }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Hidden input -->
            <input type="hidden" name="mata_kuliah" id="mata_kuliah" required>
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <p class="text-muted">Isikan dengan Periode yang sedang ditempuh saat ini (contoh: Genap 23/24)</p>
            <input type="text" id="periode" name="periode" class="form-control" placeholder="Masukkan Periode" required>
        </div>

        <div class="mb-3">
            <label for="nama_anggota_kelompok" class="form-label">Data Mahasiswa</label>
            <p class="text-muted">Nama dan NRP tiap mahasiswa (contoh: Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; dst)</p>
            <textarea id="nama_anggota_kelompok" name="nama_anggota_kelompok" class="form-control" rows="3" placeholder="Masukkan data mahasiswa" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Masukkan tujuan" required>
        </div>

        <div class="mb-3">
            <label for="topik" class="form-label">Topik</label>
            <input type="text" id="topik" name="topik" class="form-control" placeholder="Masukkan topik" required>
        </div>

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            let value = $(this).val().toLowerCase();
            $('#dropdownList li').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownList').on('click', 'li', function () {
            var selected = $(this).text();
            $('#dropdownDisplay').text(selected);
            $('#mata_kuliah').val(selected); // Set hidden input value
        });
    });
</script>

@endsection
