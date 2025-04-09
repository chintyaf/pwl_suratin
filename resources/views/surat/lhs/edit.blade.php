<div class="px-3">
    <form method="POST" action="{{ route('laporan_hasil_studi.update', $surat->id_surat) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                NIP
            </label>
            <input type="text" name="nip" id="disabledTextInput" class="form-control"
                   value="{{ $surat->nip }}">
        </div>

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Nama
            </label>
            <input type="text" name="nip" id="disabledTextInput" class="form-control"
                   value="{{ $surat->getNIP->name }}">
        </div>

        <div class="mb-3">
            <label for="keperluan_pembuatan" class="form-label">
                Keperluan Pembuatan LHS <span class="text-danger">*</span>
            </label>
            <textarea id="keperluan_pembuatan" name="keperluan_pembuatan" class="form-control" rows="3" placeholder="Jelaskan keperluan Anda" required>{{ $surat->laporanHasilStudi->keperluan_pembuatan ?? ''}}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Simpan</button>
            <form method="POST" action="{{ route('laporan_hasil_studi.destroy', $surat->id_surat) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_surat" value="{{ $surat->id_surat }}">
                <button type="submit" class="px-5 py-2 mt-3 btn btn-danger rounded-3"
                        onclick="return confirm('Yakin ingin menghapus permintaan surat ini?')">
                    Hapus
                </button>
            </form>
        </div>
    </form>
</div>
