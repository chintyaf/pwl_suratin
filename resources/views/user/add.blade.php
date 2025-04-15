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
            <label for="role" class="form-label">
                Role
            </label>
            <select name="id_role" id="dropdown" onchange="toggleInput()" class="mb-3 form-select" placeholder=required
                autofocus>
                <option value="" disabled {{ old('id_role') === null ? 'selected' : '' }}>Pilih peran</option>
                <option value="0" {{ old('id_role') == '0' ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ old('id_role') == '1' ? 'selected' : '' }}>Ketua Program Studi</option>
                <option value="2" {{ old('id_role') == '2' ? 'selected' : '' }}>Manajemen Operasional</option>
                <option value="3" {{ old('id_role') == '3' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
        </div>

        <div id="form" style="display: none">

            <div class="mb-3">
                <label for="nip" class="form-label">
                    NIP
                </label>
                <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip') }}" placeholder="Masukkan NIP"
                    required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Nama
                </label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap" required>
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

            <div id="alamat">
                <div class="mb-3">
                    <label for="password" class="form-label">
                        Alamat
                    </label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat') }}"
                        placeholder="Masukkan alamat di kartu identitas">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Alamat di Bandung
                    </label>
                    <input type="text" id="alamat_bandung" name="alamat_bandung" class="form-control" value="{{ old('alamat_bandung') }}"
                        placeholder="Masukkan alamat di Bandung (abaikan jika sudah sesuai).">
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                </label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Masukkan alamat email (cth: nama@email.com)" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control" value=""
                    placeholder="Buat kata sandi yang aman" required>
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
        </div>

    </form>
</div>


@endsection

@section('ExtraJS')
<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdown = document.getElementById("dropdown");
        const selectedValue = dropdown.value;

        console.log(selectedValue);

        if(selectedValue !== ""){
            toggleInput(); // This ensures correct visibility if form has old('id_role')
        }
    });

    function toggleInput() {
        const dropdown = document.getElementById("dropdown");
        const prodiInput = document.getElementById("prodiInput");
        const alamat = document.getElementById("alamat");
        const form = document.getElementById("form");
        const selectedValue = dropdown.value;

        form.style.display = "block"

        if (selectedValue === "0") {
            prodiInput.style.display = "none";
            alamat.style.display = "none"
        } else if(selectedValue === "1" || selectedValue === "2") {
            alamat.style.display = "none"
            prodiInput.style.display = "block";
        } else {
            alamat.style.display = "block"
            prodiInput.style.display = "block";
        }
    }


</script>
@endsection
