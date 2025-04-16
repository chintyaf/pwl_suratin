@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" method="POST" action="{{ route('program_studi.store') }}">
        @csrf
        <div class="mb-3">
            <h1 class="align-middle d-inline">Menambahkan Program Studi</h1>
            {{-- <p class="text-muted">Silakan isi form di bawah untuk mengajukan LHS.</p> --}}
        </div>

        <div class="mb-3">
            <label for="id_prodi" class="form-label">
                Kode Program Studi
            </label>
            <input type="text" id="id_prodi" name="id_prodi" class="form-control"
            placeholder="Masukkan kode program studi"
            value="{{ old('id_prodi') }}" required>
        </div>

        <div class="mb-3">
            <label for="name_prodi" class="form-label">
                Nama Program Studi
            </label>
            <input type="text" id="name_prodi" name="name_prodi"
            class="form-control" placeholder="Masukkan nama program studi dengan lengkap"
            value="{{ old('name_prodi') }}" required>
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
