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
            value="2372018">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Nama
            </label>
            <input type="text" id="disabledTextInput" class="form-control"
            value="Jennifer Charity Sharon Lukita">
          </div>

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Tanggal Kelulusan
            </label>
            <input type="date" id="disabledTextInput" class="form-control"
            value="">
          </div>

        </fieldset>
          <button type="button" class="btn btn-success">Terima</button>
          <button type="button" class="btn btn-danger">Tolak</button>
      </form>
</div>
