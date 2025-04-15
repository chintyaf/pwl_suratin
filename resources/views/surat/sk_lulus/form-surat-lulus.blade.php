@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('surat_keterangan_lulusStore') }}">
        @csrf

        <input type="hidden" id="nip" name="nip" value="{{auth()->user()->nip}}">
{{--        <input type="text" id="surat_id_surat" name="surat_id_surat" value="SKLU001">--}}
        <div class="mb-3">
            <h1 class="align-middle d-inline">Form Surat Keterangan Lulus</h1>
            <p class="text-muted">Silakan isi data berikut untuk mengajukan surat keterangan lulus.</p>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>--}}
{{--            <input type="text" id="nama" name="nama" class="form-control" placeholder="Contoh: Susi Susanti" required>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="nrp" class="form-label">NRP <span class="text-danger">*</span></label>--}}
{{--            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="Masukkan NRP Anda" required>--}}
{{--        </div>--}}

        <div class="mb-3">
            <label for="tanggal_kelulusan" class="form-label">Tanggal Kelulusan <span class="text-danger">*</span></label>
            <input type="date" id="tanggal_kelulusan" name="tanggal_kelulusan" class="form-control" required>
        </div>

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>
    </form>
</div>

@endsection
