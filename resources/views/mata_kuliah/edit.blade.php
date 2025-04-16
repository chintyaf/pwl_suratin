<div class="px-3">
    {{-- Form Update --}}
    <form method="POST" action="{{ route('mata_kuliah.update', $data->kode_mk) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_mk" class="form-label">
                Kode Mata Kuliah
            </label>
            <input type="text" id="kode_mk" name="kode_mk" class="form-control"
            placeholder="Masukkan kode Mata Kuliah"
            value="{{ $data->kode_mk }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_mk" class="form-label">
                Nama Mata Kuliah
            </label>
            <input type="text" id="nama_mk" name="nama_mk"
            class="form-control" placeholder="Masukkan nama Mata Kuliah dengan lengkap"
            value="{{ $data->nama_mk }}" required>
        </div>

        <div class="mb-3" id="prodiInput">
            <label for="role" class="form-label">
                Program Studi
            </label>
            <select name="id_prodi" id="dropdown" onchange="toggleInput()" class="mb-3 form-select">
                <option disabled selected>Pilih program studi</option>
                <option value="1" {{ $data->id_prodi == '1' ? 'selected' : '' }}>Ilmu Komputer</option>
                <option value="2" {{ $data->id_prodi == '2' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="3" {{ $data->id_prodi == '3' ? 'selected' : '' }}>Sistem Informasi</option>
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

        <div class="gap-3 d-flex justify-content-end">
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Simpan</button>
        </div>
    </form>
    <br>
    {{-- Form Delete: HARUS DI LUAR form update --}}
    <form method="POST" action="{{ route('mata_kuliah.delete', $data->kode_mk) }}" class="gap-3 d-flex justify-content-end">
        @csrf
        @method('DELETE')
        <input type="hidden" name="kode_mk" value="{{ $data->kode_mk }}">
        <button type="submit" class="px-5 py-2 btn btn-danger rounded-3"
                onclick="return confirm('Yakin ingin menghapus permintaan data ini?')">
            Hapus
        </button>
    </form>
</div>

