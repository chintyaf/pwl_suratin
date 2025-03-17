
@extends('layouts.index')
@section('content')
Ketua Program Studi
    <h1 class="mb-3 h3">
        Dashboard
    </h1>

    <div id="status" class="row">
        @php
            $cards = [
                ['title' => 'Menunggu persetujuan', 'count' => 3, 'color' => '#fcfdff', 'txt-color' => '#13879b', 'modal' => 'modalDiproses'],
                ['title' => 'Disetujui - Menunggu Dokumen', 'count' => 10, 'color' => '#fff7e8', 'txt-color' => '#faad14 ', 'modal' => 'modalMenunggu'],
                ['title' => 'Selesai', 'count' => 2, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'],
                ['title' => 'Ditolak', 'count' => 1, 'color' => '#ffeded', 'txt-color' => '#ff4d4f', 'modal' => 'modalDitolak'],
            ];
        @endphp

        <div class="d-flex">
            @foreach ($cards as $card)
                <div class="px-2 col-3">
                    <div class="mb-4 text-white card" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">
                        <div style="background-color:{{ $card['color'] }}"
                            class="text-center card-header status">
                            <h5 style="color:{{ $card['txt-color'] }};font-size: 16px" class="m-0 card-title">{{ $card['title'] }}</h5>
                        </div>
                        <div class="text-center card-body">
                            <h3 style="font-weight: 800">{{ $card['count'] }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.partials.search')

    <div class="p-2 table_component rounded-4" role="region" tabindex="0">



        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="px-3 py-2 mb-0 card-title">Menunggu Persutujuan</h5>
                    </div>
                    <div class="px-4 pb-4">
                        <table class="table p-2 my-0 table-hover">
                            <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th class="d-none d-xl-table-cell">Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Pengantar Tugas Mata Kuliah </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_tugas_mk"
                                            id="loadSurat001">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Mahasiswa Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_mhs_aktif"
                                            id="loadSurat002" onclick="edit('test')">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Lulus</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_lulus"
                                            id="loadSurat003">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Laporan Hasil Studi </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat="lhs"
                                            id="loadSurat004">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="px-3 py-2 mb-0 card-title">Diterima</h5>
                    </div>
                    <div class="px-4 pb-4">
                        <table class="table p-2 my-0 table-hover">
                            <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th class="d-none d-xl-table-cell">Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Pengantar Tugas Mata Kuliah </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_tugas_mk"
                                            id="loadSurat001">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Mahasiswa Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_mhs_aktif"
                                            id="loadSurat002" onclick="edit('test')">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Lulus</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_lulus"
                                            id="loadSurat003">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Laporan Hasil Studi </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat="lhs"
                                            id="loadSurat004">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="px-3 py-2 mb-0 card-title">Ditolak</h5>
                    </div>
                    <div class="px-4 pb-4">
                        <table class="table p-2 my-0 table-hover">
                            <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th class="d-none d-xl-table-cell">Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Pengantar Tugas Mata Kuliah </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_tugas_mk"
                                            id="loadSurat001">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Mahasiswa Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_mhs_aktif"
                                            id="loadSurat002" onclick="edit('test')">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Lulus</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_lulus"
                                            id="loadSurat003">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Laporan Hasil Studi </td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Disetujui - Menunggu Dokumen </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat="lhs"
                                            id="loadSurat004">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>

    @endsection

@section('ExtraJS')
    <script src="{{ asset('js/surat.js') }}"> </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.querySelector(".search-input");
            const suggestions = document.querySelector(".suggestions");

            searchInput.addEventListener("focus", function () {
                suggestions.style.display = "block";
            });

            document.addEventListener("click", function (event) {
                if (!searchInput.contains(event.target) && !suggestions.contains(event.target)) {
                    suggestions.style.display = "none";
                }
            });

            document.querySelectorAll(".suggestion-item").forEach(item => {
                item.addEventListener("click", function () {
                    searchInput.value = this.textContent.trim();
                    suggestions.style.display = "none";
                });
            });
        });
    </script>

@endsection
