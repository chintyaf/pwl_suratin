@extends('layouts.index')

@section('ExtraCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h1 class="mb-3 h3">Dashboard Manajer Operasional</h1>

    <div id="status" class="row">
        @php
            $cards = [
                ['title' => 'Menunggu Persetujuan', 'count' => $totalMenunggu, 'color' => '#fcfdff', 'txt-color' => '#13879b', 'modal' => 'modalDiproses'],
                ['title' => 'Disetujui - Menunggu Dokumen', 'count' => $totalDiproses, 'color' => '#fff7e8', 'txt-color' => '#faad14', 'modal' => 'modalMenunggu'],
                ['title' => 'Selesai', 'count' => $totalSelesai, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'],
                ['title' => 'Ditolak', 'count' => $totalDitolak, 'color' => '#ffeded', 'txt-color' => '#ff4d4f', 'modal' => 'modalDitolak'],
            ];
        @endphp

        <div class="d-flex">
            @foreach ($cards as $card)
                <div class="px-2 col-3">
                    <div class="mb-4 text-white card" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">
                        <div style="background-color:{{ $card['color'] }}" class="text-center card-header status">
                            <h5 style ="color:{{ $card['txt-color'] }};font-size: 16px" class="m-0 card-title">{{ $card['title'] }}</h5>
                        </div>
                        <div class="text-center card-body">
                            <h3 style="font-weight: 800">{{ $card['count'] }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="p-2 table_component rounded-4" role="region" tabindex="0">
        <div class="search-wrapper">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" id="search" placeholder="Search...">
            </div>
        </div>

{{--        @php--}}
{{--            $tables = [--}}
{{--//                ['title' => 'Menunggu Persetujuan', 'data' => $menunggu],--}}
{{--                ['title' => 'Disetujui - Menunggu Dokumen', 'data' => $diproses],--}}
{{--                ['title' => 'Selesai', 'data' => $selesai],--}}
{{--                ['title' => 'Ditolak', 'data' => $ditolak],--}}
{{--            ];--}}
{{--        @endphp--}}
        @php
            $tables = [
                ['title' => 'Menunggu Pembuatan Dokumen','data' => $diproses],
                ['title' => 'Dokumen Siap Dilihat Mahasiswa', 'data' => $selesai],

            ];
        @endphp

        @foreach ($tables as $index => $table)
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="px-3 py-2 mb-0 card-title">{{ $table['title'] }}</h5>
                        </div>
                        <div class="px-4 pb-4">
                            <table id="usersTable" class="table p-2 my-0 table-hover" data-table-id="{{ $index }}">
                                <thead>
                                <tr>
                                    <th>ID Surat</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th class="d-none d-xl-table-cell">Jenis</th>
                                    <th class="d-none d-xl-table-cell">Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Detil</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table['data'] as $surat)
                                    <tr class="data-row">
                                        <td>{{ $surat->id_surat }}</td>
                                        <td>{{ $surat->nip }}</td>
                                        <td>{{ $surat->getNIP->name }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $surat->type_surat }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $surat->created_at }}</td>
                                        <td><span class="status">{{ $surat->status_label }}</span></td>
                                        <td class="d-none d-md-table-cell">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal" data-surat="{{ $surat->type_surat }}"
                                                    data-idsurat="{{ $surat->id_surat }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent"></div>
            </div>
        </div>
    </div>

@endsection

@section('ExtraJS')
    <script src="{{ asset('js/surat.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.querySelector(".search-input");
            const table = $(".table").DataTable({
                "paging": true,
                "searching": false,
                "ordering": true,
                "info": true
            });
        });
    </script>

@endsection

{{--@extends('layouts.index')--}}

{{--@section('ExtraCSS')--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    Manajemen Operasional--}}
{{--    <h1 class="mb-3 h3">--}}
{{--        --}}{{-- Ketua Program Studi --}}
{{--        Dashboard--}}
{{--    </h1>--}}

{{--    --}}{{-- @include('layouts.partials.search') --}}

{{--    <div id="status" class="row">--}}
{{--        @php--}}
{{--            $cards = [--}}
{{--                ['title' => 'Menunggu persetujuan', 'count' => $pendingCount, 'color' => '#fcfdff', 'txt-color' => '#13879b', 'modal' => 'modalDiproses'],--}}
{{--                ['title' => 'Disetujui - Menunggu Dokumen', 'count' => $processingCount, 'color' => '#fff7e8', 'txt-color' => '#faad14 ', 'modal' => 'modalMenunggu'],--}}
{{--                ['title' => 'Dokumen Sudah Tersedia', 'count' => $completedCount, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'],--}}
{{--                ['title' => 'Dokumen Diterima', 'count' => $receivedCount, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'],--}}
{{--                ];--}}
{{--                @endphp--}}
{{--                --}}{{-- ['title' => 'Selesai', 'count' => $totalSelesai, 'color' => '#eef9e8', 'txt-color' => '#52c41a', 'modal' => 'modalSelesai'], --}}

{{--        <div class="d-flex">--}}
{{--            @foreach ($cards as $card)--}}
{{--                <div class="px-2 col-3">--}}
{{--                    <div class="mb-4 text-white card" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">--}}
{{--                        <div style="background-color:{{ $card['color'] }}"--}}
{{--                            class="text-center card-header status">--}}
{{--                            <h5 style="color:{{ $card['txt-color'] }};font-size: 16px" class="m-0 card-title">{{ $card['title'] }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="text-center card-body">--}}
{{--                            <h3 style="font-weight: 800">{{ $card['count'] }}</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="p-2 table_component rounded-4" role="region" tabindex="0">--}}
{{--    --}}{{-- Search --}}
{{--    <div class="search-wrapper">--}}
{{--        <div class="search-box">--}}
{{--            <i class="fas fa-search search-icon"></i>--}}
{{--            <input type="text" class="search-input" id="search" placeholder="Search...">--}}
{{--            --}}{{-- <input type="text" class="search-input" data-table-index="{{ $index }}" placeholder="Cari surat...">--}}
{{--            --}}
{{--        </div>--}}
{{--    </div>--}}

{{--        <div class="p-2 table_component rounded-4" role="region" tabindex="0">--}}
{{--            @php--}}
{{--            $table = [--}}
{{--                ['title' => 'Menunggu Pembuatan Dokumen', 'total' => $processingCount, 'data' => $processingSurat],--}}
{{--                ['title' => 'Dokumen Siap Dilihat Mahasiswa', 'total' => $receivedCount, 'data' => $receivedSurat],--}}
{{--                ['title' => 'Dokumen Telah Diterima Mahasiswa', 'total' => $completedCount, 'data' => $receivedCount],--}}
{{--            ];--}}
{{--            @endphp--}}

{{--            @foreach ($table as $index =>$table)--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 d-flex">--}}
{{--                    <div class="card flex-fill">--}}
{{--                        <div class="card-header">--}}

{{--                            <h5 class="px-3 py-2 mb-0 card-title">{{ $table['title'] }}</h5>--}}
{{--                        </div>--}}
{{--                        @if ($table['total'] > 0)--}}
{{--                        <div class="px-4 pb-4">--}}
{{--                            <table id="usersTable" class="table p-2 my-0 table-hover" data-table-id="{{ $index }}">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID Surat</th>--}}
{{--                                        <th>NRP</th>--}}
{{--                                        <th>Nama</th>--}}
{{--                                        <th>Jenis</th>--}}
{{--                                        --}}{{-- <th class="d-none d-xl-table-cell">Tanggal Diajukan</th> --}}
{{--                                        <th>Status</th>--}}
{{--                                        <th class="d-none d-xl-table-cell">Dokumen</th>--}}
{{--                                        <th class="d-none d-md-table-cell">Detil</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                    @foreach ($table['data'] as $surat)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $surat->id_surat }}</td>--}}
{{--                                        <td>{{ $surat->nip }}</td>--}}
{{--                                        <td>{{ $surat->getNIP->name }}</td>--}}
{{--                                        <td class="d-none d-xl-table-cell"> {{ $surat->type_surat }} </td>--}}
{{--                                        --}}{{-- <td class="d-none d-xl-table-cell">{{ $surat->created_at }}</td> --}}
{{--                                        <td><span class="status"> {{ $surat->status_label }}                                    </span></td>--}}
{{--                                        <td style="width:13%">--}}
{{--                                            @if($surat->status == "doc_available" or $surat->status == "completed")--}}
{{--                                            <a href="{{ route('surat.view', $surat->id_surat) }}" target="_blank" class="btn btn-primary">--}}
{{--                                                --}}{{-- View --}}
{{--                                                <i class="align-middle" data-feather="eye"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="{{ route('surat.download', $surat->id_surat) }}" class="btn btn-success">--}}
{{--                                                --}}{{-- Download --}}
{{--                                                <i class="align-middle" data-feather="download"></i>--}}
{{--                                            </a>--}}
{{--                                            @else--}}
{{--                                            No File--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td class="d-none d-md-table-cell">--}}
{{--                                            <button type="button" class="btn btn-primary"--}}
{{--                                                data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#myModal"--}}
{{--                                                data-surat = "{{ $surat->type_surat }}"--}}
{{--                                                data-idsurat ="{{ $surat->id_surat }}"--}}
{{--                                                --}}{{-- id="loadSurat001" --}}
{{--                                                >--}}
{{--                                                <i class="align-middle" data-feather="edit"></i>--}}
{{--                                            </button>--}}
{{--                                        </td>--}}

{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        @else--}}
{{--                        <div class="p-4">--}}
{{--                            <p>No data</p>--}}
{{--                        </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            @endforeach--}}

{{--            <!-- Bootstrap Modal -->--}}
{{--            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog">--}}
{{--                    <div class="modal-content" id="modalContent">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <!-- Bootstrap Modal -->--}}
{{--        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content" id="modalContent">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

{{--@section('ExtraJS')--}}
{{--    <script src="{{ asset('js/surat.js') }}"></script>--}}
{{--    <script src="{{ asset('js/search.js') }}"></script>--}}


{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>--}}
{{--<script>--}}
{{--document.addEventListener("DOMContentLoaded", () => {--}}
{{--    const searchInput = document.querySelector(".search-input");--}}
{{--    const table = $(".table").DataTable({ // Initialize DataTable--}}
{{--        "paging": true,--}}
{{--        "searching": false, // Disable default search--}}
{{--        "ordering": true,--}}
{{--        "info": true--}}
{{--    });--}}

{{--});--}}
{{--</script>--}}


{{--@endsection--}}
