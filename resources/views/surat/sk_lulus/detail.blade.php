{{-- Surat Keterangan Lulus
- Nama Lengkap
- NRP
- Tanggal kelulusan --}}

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
            value="{{$surat->getNIP->name}}">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Tanggal Kelulusan
            </label>
            <input type="date" id="disabledTextInput" class="form-control"
            value="{{ $surat->suratKeteranganLulus->tanggal_kelulusan }}">
          </div>

        </fieldset>
      </form>
</div>
