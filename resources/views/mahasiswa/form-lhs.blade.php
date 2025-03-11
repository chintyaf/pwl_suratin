@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Form Laporan Hasil Studi</h1>
    </div>

    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Nama Lengkap
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="contoh : Susi Susanti" required="required">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">NRP
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
                <h5 class="card-title mb-0">Keperluan Pembuatan LHS 
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