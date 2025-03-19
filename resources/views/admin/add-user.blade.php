@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form" action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <h1 class="align-middle d-inline">Add account</h1>
        </div>
        {{-- <a href="{{ route('user.multiAdd') }}">Muti Add</a> --}}

        <div class="mb-3">
            <label for="nip" class="form-label">
                NIP
            </label>
            <input type="text" id="nip" name="nip" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                Nama
            </label>
            <input type="text" id="name" name="name" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input type="email" id="email" name="email" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                Password
            </label>
            <input type="password" id="password" name="password" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">
                Role
            </label>
            <select name="id_role" id="dropdown" onchange="toggleInput()" class="mb-3 form-select" required>
                <option value="99" selected>None</option>
                <option value="0">Admin</option>
                <option value="1">Ketua Program Studi</option>
                <option value="2">Manajemen Operasional</option>
                <option value="3">Mahasiswa</option>
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
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>

      </form>
</div>


@endsection

@section('ExtraCSS')

@endsection
