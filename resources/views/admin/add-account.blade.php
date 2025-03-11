@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form class="form">
        <div class="mb-3">
            <h1 class="align-middle d-inline">Add account</h1>
        </div>
        {{-- <legend>Disabled fieldset example</legend> --}}
        <div class="mb-3">
            <label for="NIP" class="form-label">
                NIP
            </label>
            <input type="text" id="nip" name="nip" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="Nama" class="form-label">
                Nama
            </label>
            <input type="text" name="nama" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">
                Email
            </label>
            <input type="email" id="email" name="email" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">
                Password
            </label>
            <input type="password" id="password" class="form-control"
            value="" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">
                Role
            </label>
            <select name="role" id="role" class="mb-3 form-select" required>
                <option selected>None</option>
                <option>Admin</option>
                <option>Ketua Program Studi</option>
                <option>Manajemen Operasional</option>
                <option>Mahasiswa</option>
            </select>
        </div>

        <div class="justify-content-end d-flex">
            <button type="button" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>
        </div>

      </form>
</div>


@endsection
