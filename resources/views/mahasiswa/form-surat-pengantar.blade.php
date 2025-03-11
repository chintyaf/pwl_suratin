@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Form Surat Pengantar Tugas Mata Kuliah</h1>
    </div>

    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Surat Ditujukan Kepada
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <p>Informasikan secara lengkap nama, jabatan, nama perusahaan, dan alamat perusahaan (contoh: Ibu Susi Susanti; Kepala Personalia PT. X; Jln. Cibogo no. 10 Bandung)</p>
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Nama Mata Kuliah - Kode Mata Kuliah
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <p>Contoh : Proses Bisnis - IN255</p>
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Semester
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <p>Isikan dengan semester yang sedang ditempuh saat ini (contoh: Semester Genap 23/24)</p>
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Mahasiswa
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <p>Informasikan nama dan NRP tiap mahasiswa (contoh: Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; Mahasiswa 3 - 15720xx; dst)</p>
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tujuan
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Topik
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input" required="required">
            </div>
        </div>

        <div class="ln_solid">
            <div class="form-group text-center d-flex gap-2">
                <button type='submit' class="btn btn-primary px-4">Submit</button>
                <button type='reset' class="btn btn-success px-">Reset</button>
            </div>
        </div>
    </div>
</div>
   
@endsection

@section('ExtraJS')
<script src="{{ asset('js/surat.js') }}"></script>
@endsection