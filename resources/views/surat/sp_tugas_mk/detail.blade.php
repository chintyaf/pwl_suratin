{{-- Surat Pengantar Tugas Mata Kuliah
- Surat Ditujukan Kepada
Informasikan secara lengkap nama, jabatan, nama perusahaan, dan alamat perusahaan (contoh: Ibu Susi Susanti; Kepala Personalia PT. X; Jln. Cibogo no. 10 Bandung)
- Nama Mata Kuliah - Kode Mata Kuliah
Contoh  Proses Bisnis - IN255
- Semester
Isikan dengan semester yang sedang ditempuh saat ini (contoh: Semester Genap 23/24)
- Data Mahasiswa
Informasikan nama dan NRP tiap mahasiswa (contoh: Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; Mahasiswa 3 - 15720xx; dst)
- Tujuan 
- Topik --}}

<div class="px-3">
    <form>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">
                    ID Surat
                </label>
                <input type="text" id="disabledTextInput" class="form-control"
                value="{{ $surat->id_surat }}">

                <label for="disabledTextInput" class="form-label">
                    NRP
                </label>
                <input type="text" id="disabledTextInput" class="form-control"
                value="{{ $surat->nip }}">
                </div>

                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">
                    Nama
                </label>
                <input type="text" id="disabledTextInput" class="form-control"
                value="{{ $surat->getNIP->name }}">
                </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Surat Ditujukan Kepada
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
            value="{{ $surat->suratPengantar->ditujukan_kepada }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Nama Mata Kuliah - Kode Mata Kuliah
            </label>
            <input type="text" id="disabledTextInput" class="form-control" value="{{ $surat->suratPengantar->periode }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Periode
            </label>
            <input type="text" id="disabledTextInput" class="form-control" value="{{ $surat->suratPengantar->periode }}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Data Mahasiswa
            </label>
            <textarea
                class="form-control"
                rows="4"
                placeholder="Textarea">{{ $surat->suratPengantar->nama_anggota_kelompok }}</textarea>
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Tujuan
            </label>
            <textarea
                class="form-control"
                rows="4"
                placeholder="Textarea">{{ $surat->suratPengantar->tujuan }}</textarea>
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Topik</label>
            <input type="text" id="disabledTextInput" class="form-control" value="{{ $surat->suratPengantar->topik }}">
          </div>

        </fieldset>
      </form>
</div>
