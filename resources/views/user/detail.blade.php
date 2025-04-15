<div class="px-3">
    <form action="{{ route('user.update', [$user->nip]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_role" class="form-label">
                Role
            </label>

            <select class="form-select" name="id_role" disabled>
                <option value="0" {{ $user->id_role == '0' ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $user->id_role == '1' ? 'selected' : '' }}>Kepala Program Studi</option>
                <option value="2" {{ $user->id_role == '2' ? 'selected' : '' }}>Manajemen Operasional</option>
                <option value="3" {{ $user->id_role == '3' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                NIP
            </label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ $user->nip }}" disabled>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                Nama
            </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>

        @if($user->id_role != '0')
        <div class="mb-3" id="prodiInput">
            <label for="role" class="form-label">
                Program Studi
            </label>
            <select name="id_prodi" id="dropdown" onchange="toggleInput()" class="mb-3 form-select">
                <option disabled selected>Pilih program studi</option>
                <option value="1" {{ $user->id_prodi == '1' ? 'selected' : '' }}>Ilmu Komputer</option>
                <option value="2" {{ $user->id_prodi == '2' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="3" {{ $user->id_prodi == '3' ? 'selected' : '' }}>Sistem Informasi</option>
            </select>
        </div>
        @endif

        @if($user->id_role == '3')
        <div class="mb-3">
            <label for="alamat" class="form-label">
                Alamat
            </label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->alamat ?? ""}}">
        </div>

        <div class="mb-3">
            <label for="alamat_bandung" class="form-label">
                Alamat (di Bandung)
            </label>
            <input type="text" id="alamat_bandung" name="alamat_bandung" class="form-control" value="{{ $user->alamat_bandung ?? ""}}">
        </div>
        @endif

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif




        <div class="gap-2 justify-content-end d-flex">
            @if ($user->id_role === '1' || $user->id_role === '2')
            <button type="button" class="disable-button btn btn-danger" data-url="{{ route('user.disable', $user->nip) }}">
                Disable
            </button>
            @endif
            <a href="#" class="delete-button btn btn-danger" data-url="{{ route('user.delete', $user->nip) }}">
                Delete
            </a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>

