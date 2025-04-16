<div class="px-3">
    {{-- Form Update --}}
    <form method="POST" action="{{ route('program_studi.update', $data->id_prodi) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_prodi" class="form-label">
                Kode Program Studi
            </label>
            <input type="text" id="id_prodi" name="id_prodi" class="form-control"
            placeholder="Masukkan kode program studi"
            value="{{ $data->id_prodi }}" required>
        </div>

        <div class="mb-3">
            <label for="name_prodi" class="form-label">
                Nama Program Studi
            </label>
            <input type="text" id="name_prodi" name="name_prodi"
            class="form-control" placeholder="Masukkan nama program studi dengan lengkap"
            value="{{ $data->name_prodi }}" required>
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
    <form method="POST" action="{{ route('program_studi.delete', $data->id_prodi) }}" class="gap-3 d-flex justify-content-end">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id_prodi" value="{{ $data->id_prodi }}">
        <button type="submit" class="px-5 py-2 btn btn-danger rounded-3"
                onclick="return confirm('Yakin ingin menghapus permintaan data ini?')">
            Hapus
        </button>
    </form>
</div>

