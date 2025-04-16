@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('type_surat.store') }}">
        @csrf
        <div class="mb-3">
            <h1 class="align-middle d-inline">Menambahkan Jenis Surat</h1>
            {{-- <p class="text-muted">Silakan isi form di bawah untuk mengajukan LHS.</p> --}}
        </div>

        <div class="mb-3">
            <label for="id_type" class="form-label">
                Kode Jenis Surat
            </label>
            <input type="text" id="id_type" name="id_type" class="form-control"
            placeholder="Masukkan kode Jenis Surat"
            value="{{ old('id_type') }}" required>
        </div>

        <div class="mb-3">
            <label for="name_type" class="form-label">
                Nama Jenis Surat
            </label>
            <input type="text" id="name_type" name="name_type"
            class="form-control" placeholder="Masukkan nama Jenis Surat dengan lengkap"
            value="{{ old('name_type') }}" required>
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
