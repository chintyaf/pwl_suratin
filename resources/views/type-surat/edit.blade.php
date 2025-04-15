<div class="px-3">
    {{-- Form Update --}}
    <form method="POST" action="{{ route('type_surat.update', $data->id_type) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_type" class="form-label">
                Kode Program Studi
            </label>
            <input type="text" id="id_type" name="id_type" class="form-control"
            placeholder="Masukkan kode program studi"
            value="{{ $data->id_type }}" required>
        </div>

        <div class="mb-3">
            <label for="name_type" class="form-label">
                Nama Program Studi
            </label>
            <input type="text" id="name_type" name="name_type"
            class="form-control" placeholder="Masukkan nama program studi dengan lengkap"
            value="{{ $data->name_type }}" required>
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
    <form method="POST" action="{{ route('type_surat.delete', $data->id_type) }}" class="gap-3 d-flex justify-content-end">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id_type" value="{{ $data->id_type }}">
        <button type="submit" class="px-5 py-2 btn btn-danger rounded-3"
                onclick="return confirm('Yakin ingin menghapus permintaan data ini?')">
            Hapus
        </button>
    </form>
</div>

