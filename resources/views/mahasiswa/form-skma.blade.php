@extends('mahasiswa.mahasiswa')
@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Form Surat Keterangan Mahasiswa Aktif</h1>
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
                <h5 class="card-title mb-0">Semester
                    <span
                        class="required">*
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="pilihSemester">Pilih semester yang ditempuh saat ini</label>
                    <select class="form-select" id="pilihSemester">
                      <option selected>Choose</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Alamat lengkap Mahasiswa di Bandung
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
                <h5 class="card-title mb-0">Keperluan Pengajuan
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