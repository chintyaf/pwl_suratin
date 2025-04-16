@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('mata_kuliah.store') }}">
        @csrf
        <div class="mb-3">
            <h1 class="align-middle d-inline">Menambahkan Mata Kuliah</h1>
        </div>

        <div class="mb-3">
            <label for="kode_mk" class="form-label">
                Kode Mata Kuliah
            </label>
            <input type="text" id="kode_mk" name="kode_mk" class="form-control"
            placeholder="Masukkan kode Mata Kuliah"
            value="{{ old('kode_mk') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_mk" class="form-label">
                Nama Mata Kuliah
            </label>
            <input type="text" id="nama_mk" name="nama_mk"
            class="form-control" placeholder="Masukkan nama Mata Kuliah dengan lengkap"
            value="{{ old('nama_mk') }}" required>
        </div>

        <div class="mb-3" id="prodiInput">
            <label for="role" class="form-label">
                Program Studi
            </label>
            <select name="id_prodi" id="dropdown" onchange="toggleInput()" class="mb-3 form-select">
                <option disabled selected>Pilih program studi</option>
                <option value="1" {{ old('id_prodi') == '1' ? 'selected' : '' }}>Ilmu Komputer</option>
                <option value="2" {{ old('id_prodi') == '2' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="3" {{ old('id_prodi') == '3' ? 'selected' : '' }}>Sistem Informasi</option>
            </select>
        </div>

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="justify-content-end d-flex">
            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>

    </form>
</div>

@endsection
