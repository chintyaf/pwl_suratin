{{-- Laporan Hasil Studi
- Nama Lengkap
- NRP
- Keperluan Pembuatan LHS --}}

<div class="px-3">
    <form>
        <fieldset disabled>
          {{-- <legend>Disabled fieldset example</legend> --}}
          <div class="mb-3">
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
                Keperluan Pembuatan LHS
            </label>
            <textarea class="form-control" rows="4" placeholder="Textarea"> {{ $surat->laporanHasilStudi->keperluan_pembuatan ?? '-'}}
            </textarea>
          </div>

        </fieldset>
      </form>
</div>
