{{-- - Nama Lengkap
- NRP
- Semester
- Alamat Lengkap Mahasiswa di Bandung
- Keperluan Pengajuan --}}

<div class="px-3">
    <form>
        <fieldset disabled>
          {{-- <legend>Disabled fieldset example</legend> --}}
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                NRP
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
                   value="{{ $surat->nip }}" readonly>
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Nama
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
            value="{{ $surat->getNIP->name }}" readonly>
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Alamat Lengkap Mahasiswa di Bandung
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
                   value="{{ $surat->suratKeteranganMahasiswaAktif->alamat_bandung ?? '-'}}" readonly>
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Keperluan Pengajuan
            </label>
              <textarea class="form-control" rows="4" placeholder="Textarea" readonly>{{ $surat->suratKeteranganMahasiswaAktif->keperluan_pengajuan ?? '-'}}</textarea>
          </div>

        </fieldset>

      </form>
</div>
