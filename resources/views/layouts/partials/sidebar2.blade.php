<nav id="sidebar" class="pc-sidebar sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand d-flex justify-content-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/logo/SuratIn_Logo_v2.svg') }}" alt="" class="col-8">
        </a>

        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>


                @if (auth()->user()->id_role === '0')

                <li class="pc-item pc-caption">
                    <label>Akun</label>
                </li>

                @php
                $adm_links = [
                ['title' => 'List Akun', 'url' => 'user.index'],
                ['title' => 'Buat Akun', 'url' => 'user.add'],
                ];
                @endphp

                @foreach ($adm_links as $link)
                <li class="pc-item {{ request()->routeIs($link['url']) ? 'active' : '' }}">
                    <a href="{{ route($link['url']) }}" class="pc-link">
                        <span class="pc-mtext">{{ $link['title'] }}</span>
                    </a>
                </li>
                @endforeach

                @elseif (auth()->user()->id_role === '1')
                @elseif(auth()->user()->id_role === '2')
                @elseif(auth()->user()->id_role === '3')

                <li class="pc-item pc-caption">
                    <label>Form Surat</label>
                </li>

                @php
                $mhs_links = [
                ['title' => 'Surat Keterangan Mahasiswa Aktif', 'url' => 'form-sk-mhs-aktif'],
                ['title' => 'Surat Pengantar Tugas Mata Kuliah', 'url' => 'form-sp-tugas-mk'],
                ['title' => 'Surat Keterangan Lulus', 'url' => 'form-sk-lulus'],
                ['title' => 'Laporan Hasil Studi', 'url' => 'form-lhs'],
                ];
                @endphp

                @foreach ($mhs_links as $link)
                <li class="pc-item {{ request()->is($link['url']) ? 'active' : '' }}">
                    <a href="{{ route($link['url']) }}" class="pc-link">
                        <span class="pc-mtext">{{ $link['title'] }}</span>
                    </a>
                </li>
                @endforeach

                @endif
            </ul>
        </div>

    </div>
</nav>
