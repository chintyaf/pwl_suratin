<nav id="sidebar" class="sidebar js-sidebar bg-white shadow-sm border-end">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand d-flex justify-content-center" href="{{ route('mhs.dashboard') }}">
            <img src="{{ asset('img/logo/SuratIn_Logo_v2.svg') }}" alt="" class="col-8">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header border-bottom pb-3 mb-3 text-uppercase fw-bold text-secondary ">
                <span>Form Surat</span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center" href="{{ route('form-sk-mhs-aktif') }}">
                    Surat Keterangan Mahasiswa Aktif
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center" href="{{ route('form-sp-tugas-mk') }}">
                    Surat Pengantar Tugas Mata Kuliah
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center" href="{{ route('form-sk-lulus') }}">
                    Surat Keterangan Lulus
                </a>
            </li>

            <li class="sidebar-item mb-4">
                <a class="sidebar-link d-flex align-items-center" href="{{ route('form-lhs') }}">
                    Laporan Hasil Studi
                </a>
            </li>

            <li class="sidebar-header border-top pt-3 mt-3 pb-3 mb-3 text-uppercase fw-bold text-secondary">
                <span>Riwayat Pengajuan</span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center" href="{{ route('history-mahasiswa') }}">
                    Daftar Pengajuan Surat
                </a>
            </li>
        </ul>
    </div>
</nav>