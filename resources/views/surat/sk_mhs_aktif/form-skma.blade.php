@extends('mhs.mahasiswa')
@section('content')

<div class="p-0 container-fluid">
    <form class="form">
        <div class="mb-3">
            <h1 class="align-middle d-inline">Pengajuan Surat Keterangan Mahasiswa Aktif</h1>
            <p class="text-muted">Silakan isi data berikut untuk mengajukan surat keterangan mahasiswa aktif.</p>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Contoh: Susi Susanti" required>
        </div>

        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="Masukkan NRP Anda" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select name="semester" id="semester" class="mb-3 form-select" required>
                <option selected>Choose</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap di Bandung</label>
            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
        </div>

        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan Pengajuan</label>
            <input type="text" id="keperluan" name="keperluan" class="form-control" placeholder="Masukkan keperluan pengajuan" required>
        </div>

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>
    </form>
</div>

@endsection
