<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand d-flex justify-content-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/logo/SuratIn_Logo_v2.svg') }}" alt="" class="col-8">
        </a>

        <ul class="sidebar-nav">
                <li class="sidebar-header {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a class="" href="{{ route('dashboard') }}">
                        <span class="">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('admin.dashboard') }}">
                        Admin
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('kaprodi.dashboard') }}">
                        Kaprodi
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('mo.dashboard') }}">
                        MO
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('mahasiswa.dashboard')}}">
                        Mahasiswa
                    </a>
                </li>


            <li class="sidebar-header">
                User
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link " href="{{ route('add-account') }}">
                    <span class="">
                        Buat Akun
                    </span>
                </a>
            </li>

            <li class="sidebar-header">
                <span>
                    Form Surat
                </span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link actives" href="{{ route('form-sk-mhs-aktif') }}">
                    <span class="align-middle">
                        Surat Keterangan Mahasiswa Aktif
                    </span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link actives" href="{{ route('form-sp-tugas-mk') }}">
                    <span class="align-middle">
                        Surat Pengantar Tugas Mata Kuliah
                    </span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link actives" href="{{ route('form-sk-lulus') }}">
                    <span class="align-middle">
                        Surat Keterangan Lulus
                    </span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link actives" href="{{ route('form-lhs') }}">
                    <span class="align-middle">
                        Laporan Hasil Studi
                    </span>
                </a>
            </li>

        </ul>

    </div>
</nav>
