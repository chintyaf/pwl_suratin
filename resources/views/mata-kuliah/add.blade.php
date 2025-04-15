@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('laporan_hasil_studiStore') }}">
        @csrf

        <input type="hidden" id="nip" name="nip" value = "{{ auth()->user()->nip }}">
        <input type="hidden" id="name" name="name" value = "{{ auth()->user()->name }}">
        <input type="text" id="surat_id_surat" name="surat_id_surat" value = "LHST001">
        <div class="mb-3">
            <h1 class="align-middle d-inline">Form Laporan Hasil Studi</h1>
            <p class="text-muted">Silakan isi form di bawah untuk mengajukan LHS.</p>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="nama" class="form-label">--}}
{{--                Nama Lengkap <span class="text-danger">*</span>--}}
{{--            </label>--}}
{{--            <input type="text" id="nama" name="nama" class="form-control" placeholder="Contoh: Susi Susanti" required>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="nrp" class="form-label">--}}
{{--                NRP <span class="text-danger">*</span>--}}
{{--            </label>--}}
{{--            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="Masukkan NRP Anda" required>--}}
{{--        </div>--}}

        <div class="mb-3">
            <label for="keperluan_pembuatan" class="form-label">
                Keperluan Pembuatan LHS <span class="text-danger">*</span>
            </label>
            <textarea id="keperluan_pembuatan" name="keperluan_pembuatan" class="form-control" rows="3" placeholder="Jelaskan keperluan Anda" required></textarea>
        </div>

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>

    </form>
</div>

@endsection

@section('ExtraJS')
<script src="{{ asset('js/surat.js') }}"></script>

@endsection
