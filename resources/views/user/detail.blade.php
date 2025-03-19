{{-- Surat Keterangan Lulus
- NIP
- Nama
- Email
- Role

--}}

<div class="px-3">
    <form action="{{ route('user.update', $user->nip) }}" method="post">
        @csrf
          {{-- <legend>Disabled fieldset example</legend> --}}
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                NIP
            </label>
            <input type="text" name="nip" id="disabledTextInput" class="form-control"
            value="{{ $user->nip }}">

          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Nama
            </label>
            <input type="text" name="name" id="disabledTextInput" class="form-control"
            value="{{ $user->name }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Email
            </label>
            <input type="text" name="email" id="disabledTextInput" class="form-control"
            value="{{ $user->email }}">
        </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Alamat
            </label>
            <input type="text" name="test" id="disabledTextInput" class="form-control"
            value="{{ $user->alamat }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Alamat (di Bandung)
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
            value="{{ $user->alamat_bandung }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Role
            </label>

        <select class="form-select" name="id_role">
                <option value="0" {{ $user->getRole->name_role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $user->getRole->name_role == 'Kepala Program Studi' ? 'selected' : '' }}>Kepala Program Studi</option>
                <option value="2" {{ $user->getRole->name_role == 'Manajemen Operasional' ? 'selected' : '' }}>Manajemen Operasional</option>
                <option value="3" {{ $user->getRole->name_role == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
          </div>

          <div class="gap-2 justify-content-end d-flex">
              <button type="button" class="btn btn-danger">Hapus</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

      </form>
</div>
