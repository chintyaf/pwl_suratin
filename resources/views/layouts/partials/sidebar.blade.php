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

                {{-- <li class="sidebar-item">
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
                    <a class="sidebar-link " href="{{ route('mhs.dashboard')}}">
                        Mahasiswa
                    </a>
                </li> --}}


            @if (auth()->user()->id_role === '0')
                <li class="sidebar-header {{ request()->is('user') ? 'active' : '' }}">
                    <a class="" href="{{ route('user.index') }}">
                        <span class="">
                            User
                        </span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('add-user') ? 'active' : '' }}">
                    <a class="sidebar-link " href="{{ route('user.add') }}">
                        <span class="">
                            Buat Akun
                        </span>
                    </a>
                </li>

            @elseif (auth()->user()->id_role === '1')
            @elseif(auth()->user()->id_role === '2')
            @elseif(auth()->user()->id_role === '3')
                <li class="sidebar-header">
                    <span>
                        Form Surat
                    </span>

                    <li class="sidebar-item {{ request()->is('form-sk-mhs-aktif') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('form-sk-mhs-aktif') }}">
                            <span class="align-middle">
                                Surat Keterangan Mahasiswa Aktif
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('form-sp-tugas-mk') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('form-sp-tugas-mk') }}">
                            <span class="align-middle">
                                Surat Pengantar Tugas Mata Kuliah
                            </span>
                        </a>
                    </li>
                </li>


                <li class="sidebar-item {{ request()->is('form-sk-lulus') ? 'active' : '' }}">
                    <a class="sidebar-link " href="{{ route('form-sk-lulus') }}">
                        <span class="align-middle">
                            Surat Keterangan Lulus
                        </span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('form-lhs') ? 'active' : '' }}">
                    <a class="sidebar-link " href="{{ route('form-lhs') }}">
                        <span class="align-middle">
                            Laporan Hasil Studi
                        </span>
                    </a>
                </li>


                <li class="sidebar-header">
                    <span>Riwayat Pengajuan</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('history-mahasiswa') }}">
                        Daftar Pengajuan Surat
                    </a>
                </li>

            @endif




        </ul>

    </div>
</nav>
