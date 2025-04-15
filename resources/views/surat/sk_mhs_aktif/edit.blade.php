<div class="px-3">
    <form method="POST" action="{{ route('surat_keterangan_mahasiswa_aktif.update' , $surat->id_surat) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">NIP</label>
            <input type="text" name="nip" id="disabledTextInput" class="form-control" value="{{ $surat->nip }}" readonly>
        </div>

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama</label>
            <input type="text" name="nip" id="disabledTextInput" class="form-control" value="{{ $surat->getNIP->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            {{-- <select name="periode" id="periode" class="mb-3 form-select" required>
                <option selected>Choose</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option>{{ $i }}</option>
                @endfor
            </select> --}}
            <input type="text" id="periode" name="periode" class="form-control" value="{{ $surat->suratKeteranganMahasiswaAktif->periode ?? ''}}" required>

        </div>

        <div class="mb-3">
            <label for="alamat_bandung" class="form-label">Alamat Lengkap di Bandung</label>
            <input type="text" id="alamat_bandung" name="alamat_bandung" class="form-control" value="{{ $surat->suratKeteranganMahasiswaAktif->alamat_bandung ?? ''}}" required>
        </div>

        <div class="mb-3">
            <label for="keperluan_pengajuan" class="form-label">Keperluan Pengajuan</label>
            <input type="text" id="keperluan_pengajuan" name="keperluan_pengajuan" class="form-control" value="{{$surat->suratKeteranganMahasiswaAktif->keperluan_pengajuan ?? ''}}" required>
        </div>

        @if($surat->status === 'pending')
            <div class="d-flex justify-content-end gap-3">
                <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Simpan</button>
            </div>
        @endif

{{--        <div class="justify-content-end d-flex">--}}
{{--            <button type="reset" class="px-5 py-2 mt-3 btn btn-secondary rounded-3 me-2">Reset</button>--}}
{{--            <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Submit</button>--}}
{{--        </div>--}}
    </form>

    <br>
    {{-- Form Delete: HARUS DI LUAR form update --}}
    @if($surat->status === 'pending')
        <form method="POST" action="{{ route('laporan_hasil_studi.destroy', $surat->id_surat) }}" class="d-flex justify-content-end gap-3">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_surat" value="{{ $surat->id_surat }}">
            <button type="submit" class="px-5 py-2 btn btn-danger rounded-3"
                    onclick="return confirm('Yakin ingin menghapus permintaan surat ini?')">
                Hapus
            </button>
        </form>
    @endif
</div>

