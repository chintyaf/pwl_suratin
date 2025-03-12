@extends('mhs.mahasiswa')
@section('content')

<div class="p-0 container-fluid">
    <form class="form">
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
            <label for="mata_kuliah" class="form-label">Nama Mata Kuliah - Kode Mata Kuliah</label>
            <p class="text-muted">Contoh: Proses Bisnis - IN255</p>
            <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control" placeholder="Masukkan mata kuliah dan kode" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <p class="text-muted">Isikan dengan semester yang sedang ditempuh saat ini (contoh: Semester Genap 23/24)</p>
            <input type="text" id="semester" name="semester" class="form-control" placeholder="Masukkan semester" required>
        </div>

        <div class="mb-3">
            <label for="data_mahasiswa" class="form-label">Data Mahasiswa</label>
            <p class="text-muted">Nama dan NRP tiap mahasiswa (contoh: Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; dst)</p>
            <textarea id="data_mahasiswa" name="data_mahasiswa" class="form-control" rows="3" placeholder="Masukkan data mahasiswa" required></textarea>
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

@endsection
