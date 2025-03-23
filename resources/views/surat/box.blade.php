<div class="modal-header">
    <h5 class="modal-title" id="suratDetailTitle">Loading...</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="suratDetailBody" style="padding-bottom: 0px">
    <p>Loading...</p>
</div>

{{--
<hr> --}}

<div id="submit-btn" class="pt-0 modal-body" style="padding-bottom: 16px">


    {{-- MO --}}
    @if (auth()->user()->id_role === '2')
    <div class="mb-3">
        <form action="{{ route('surat.upload', $surat->id_surat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="disabledTextInput" class="form-label">
                Unggah Dokumen
            </label>
            <input type="file" name="dokumen" id="" class="form-control">
            <button type="submit">Upload</button>
        </form>
    </div>

    {{-- <button type="button" class="btn btn-success">Simpan</button> --}}

    @endif


    {{-- Kaprodi --}}
    @if (auth()->user()->id_role === '1')
    <form action="{{ route('surat.updateStatus', $surat->id_surat) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="gap-3 px-3 justify-content-center d-flex">
            <button type="submit" name="status" value="setuju" class="btn btn-success">Mensetujui</button>
            <button type="submit" name="status" value="tolak" class="btn btn-danger">Menolak</button>
        </div>
    </form>
    @endif

</div>
<div class="modal-footer">
</div>
