{{--@extends('layouts.index')--}}
{{--@section('content')--}}

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('surat_keterangan_mahasiswa_aktif.update' , $surat->id_surat) }}">
        @csrf

        <input type="hidden" id="nip" name="nip" value = "{{ auth()->user()->nip }}">
        <input type="text" id="surat_id_surat" name="surat_id_surat" value = "SKMA001">
        <div class="mb-3">
            <h1 class="align-middle d-inline">Pengajuan Surat Keterangan Mahasiswa Aktif</h1>
            <p class="text-muted">Silakan isi data berikut untuk mengajukan surat keterangan mahasiswa aktif.</p>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="nama" class="form-label">Nama Lengkap</label>--}}
{{--            <input type="text" id="nama" name="nama" class="form-control" placeholder="Contoh: Susi Susanti" required>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="nrp" class="form-label">NRP</label>--}}
{{--            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="Masukkan NRP Anda" required>--}}
{{--        </div>--}}

        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            {{-- <select name="periode" id="periode" class="mb-3 form-select" required>
                <option selected>Choose</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option>{{ $i }}</option>
                @endfor
            </select> --}}
            <input type="text" id="periode" name="periode" class="form-control" placeholder="Contoh : Genap 2025/2026" required>

        </div>

        <div class="mb-3">
            <label for="alamat_bandung" class="form-label">Alamat Lengkap di Bandung</label>
            <input type="text" id="alamat_bandung" name="alamat_bandung" class="form-control" placeholder="Masukkan alamat lengkap" required>
        </div>

        <div class="mb-3">
            <label for="keperluan_pengajuan" class="form-label">Keperluan Pengajuan</label>
            <input type="text" id="keperluan_pengajuan" name="keperluan_pengajuan" class="form-control" placeholder="Masukkan keperluan pengajuan" required>
        </div>

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>
    </form>
</div>

@endsection
