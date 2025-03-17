<div class="modal-header">
    <h5 class="modal-title" id="suratDetailTitle">Loading...</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="suratDetailBody" style="padding-bottom: 0px">
    <p>Loading...</p>
</div>

{{-- <hr> --}}

<div id="submit-btn" class="pt-0 modal-body"  style="padding-bottom: 16px">


        {{-- MO --}}
        @if (auth()->user()->id_role === '2')
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">
                Unggah Dokumen
            </label>
            <input type="file" name="" id="" class="form-control" >
        </div>

        {{-- <button type="button" class="btn btn-success">Simpan</button> --}}

        @endif


        {{-- Kaprodi --}}
    @if (auth()->user()->id_role === '1')
    <div class="gap-3 px-3 justify-content-center d-flex">
        <button type="button" class="btn btn-success">Terima</button>
        <button type="button" class="btn btn-danger">Tolak</button>
    </div>
    @endif

</div>
{{-- <div class="modal-footer"> --}}
    {{-- Kaprodi --}}
    {{-- <button type="button" class="btn btn-success">Terima</button>
    <button type="button" class="btn btn-danger">Tolak</button> --}}

    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
{{-- </div> --}}
