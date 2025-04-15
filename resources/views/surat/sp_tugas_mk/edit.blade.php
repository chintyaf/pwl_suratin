<div class="px-3">
    <form method="POST" action="{{ route('surat_pengantar.update' , $surat->id_surat) }}">
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
            <label for="ditujukan_kepada" class="form-label">Surat Ditujukan Kepada</label>
            <p class="text-muted">Nama, jabatan, perusahaan, dan alamat (contoh: Ibu Susi Susanti; Kepala Personalia PT. X; Jln. Cibogo no. 10 Bandung)</p>
            <input type="text" id="ditujukan_kepada" name="ditujukan_kepada" class="form-control" value="{{ $surat->suratPengantar->ditujukan_kepada ?? ''}}" required>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="mata_kuliah" class="form-label fw-bold">Nama Mata Kuliah - Kode Mata Kuliah</label>--}}
{{--            <div class="dropdown w-100">--}}
{{--                <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle"--}}
{{--                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--            <span id="dropdownDisplay">--}}
{{--                --}}{{-- Ini hanya untuk tampilan, JS akan override jika user memilih baru --}}
{{--                {{ $surat->suratPengantar->mata_kuliah ?? 'Pilih Mata Kuliah' }}--}}
{{--            </span>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu w-100 p-2">--}}
{{--                    <input type="text" class="form-control mb-2" id="searchInput" placeholder="Cari Mata Kuliah">--}}
{{--                    <ul class="list-unstyled mb-0" id="dropdownList">--}}
{{--                        @php--}}
{{--                            $options = ['Proses Bisnis - IN255', 'Dasar Pemrograman - IN220', 'Web Dasar - IN212'];--}}
{{--                        @endphp--}}
{{--                        @foreach($options as $option)--}}
{{--                            <li><a class="dropdown-item" href="#" data-value="{{ $option }}">{{ $option }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Hidden input (VALUE awal tetap dari database) -->--}}
{{--            <input type="hidden" name="mata_kuliah" id="mata_kuliah" value="{{ $surat->suratPengantar->mata_kuliah ?? '' }}" required>--}}
{{--        </div>--}}


{{--        <div class="mb-3">--}}
{{--            <label for="mata_kuliah" class="form-label fw-bold">Nama Mata Kuliah - Kode Mata Kuliah</label>--}}
{{--            <div class="dropdown w-100">--}}
{{--                <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    <span id="dropdownDisplay">{{ $surat->suratPengantar->mata_kuliah ?? '' }}</span>--}}

{{--                </button>--}}
{{--                <div class="dropdown-menu w-100 p-2">--}}
{{--                    <input type="text" class="form-control mb-2" id="searchInput" placeholder="Cari Mata Kuliah">--}}
{{--                    <ul class="list-unstyled mb-0" id="dropdownList">--}}
{{--                        <li><a class="dropdown-item" href="#">Proses Bisnis - IN255</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Dasar Pemrograman - IN220</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Web Dasar - IN212</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Hidden input -->--}}
{{--                    <input type="hidden" name="mata_kuliah" id="mata_kuliah" value="{{ $surat->suratPengantar->mata_kuliah ?? '' }}" required>--}}
{{--        </div>--}}

        <div class="mb-3">
            <label for="mata_kuliah" class="form-label fw-bold">Nama Mata Kuliah - Kode Mata Kuliah</label>
            <div class="dropdown w-100">
                <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle"
                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="dropdownDisplay">
                {{ $surat->suratPengantar->mata_kuliah ?? 'Pilih Mata Kuliah' }}
            </span>
                </button>

                <div class="dropdown-menu w-100 p-2">
                    <input type="text" class="form-control mb-2" id="searchInput" placeholder="Cari Mata Kuliah">
                    <ul class="list-unstyled mb-0" id="dropdownList">
                        @php
                            $mataKuliahOptions = ['Proses Bisnis - IN255', 'Dasar Pemrograman - IN220', 'Web Dasar - IN212'];
                        @endphp
                        @foreach ($mataKuliahOptions as $option)
                            <li><a class="dropdown-item" href="#" data-value="{{ $option }}">{{ $option }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <input type="hidden" name="mata_kuliah" id="mata_kuliah" value="{{ $surat->suratPengantar->mata_kuliah ?? '' }}" required>
        </div>


        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <p class="text-muted">Isikan dengan Periode yang sedang ditempuh saat ini (contoh: Genap 23/24)</p>
            <input type="text" id="periode" name="periode" class="form-control" value="{{ $surat->suratPengantar->periode ?? ''}}" required>
        </div>



        <div class="mb-3">
            <label for="nama_anggota_kelompok" class="form-label">Data Mahasiswa</label>
            <p class="text-muted">Nama dan NRP tiap mahasiswa (contoh: Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; dst)</p>
            <textarea id="nama_anggota_kelompok" name="nama_anggota_kelompok" class="form-control" rows="3" required>{{ $surat->suratPengantar->nama_anggota_kelompok ?? ''}}</textarea>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" id="tujuan" name="tujuan" class="form-control" value="{{ $surat->suratPengantar->tujuan ?? ''}}" required>
        </div>

        <div class="mb-3">
            <label for="topik" class="form-label">Topik</label>
            <input type="text" id="topik" name="topik" class="form-control" value="{{ $surat->suratPengantar->topik ?? ''}}" required>
        </div>

        @if($surat->status === 'pending')
            <div class="d-flex justify-content-end gap-3">
                <button type="submit" class="px-5 py-2 mt-3 btn btn-primary rounded-3">Simpan</button>
            </div>
        @endif
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownList = document.getElementById('dropdownList');
            const dropdownItems = dropdownList.querySelectorAll('.dropdown-item');
            const dropdownDisplay = document.getElementById('dropdownDisplay');
            const hiddenInput = document.getElementById('mata_kuliah');
            const searchInput = document.getElementById('searchInput');

            dropdownItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const selectedValue = this.getAttribute('data-value');
                    dropdownDisplay.textContent = selectedValue;
                    hiddenInput.value = selectedValue;
                });
            });

            searchInput.addEventListener('keyup', function () {
                const filter = this.value.toLowerCase();
                dropdownItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(filter) ? 'block' : 'none';
                });
            });
        });
    </script>
@endpush
