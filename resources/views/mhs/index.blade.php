@extends('layouts.index')
{{-- @extends('mhs.mahasiswa') --}}
@section('content')
    <div class="container mt-4">
        <!-- Welcome Message -->
        <div class="mb-4 text-center">
            <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-muted">Kelola pengajuan surat akademik Anda dengan mudah.</p>
        </div>

        <!-- Row 1: Ringkasan -->
        <div class="row">
            @php
                $cards = [
                    [
                        'title' => 'Menunggu persetujuan',
                        'count' => $menunggu,
                        'color' => '#fcfdff',
                        'txt-color' => '#13879b',
                        'modal' => 'modalDiproses',
                    ],
                    [
                        'title' => 'Disetujui - Menunggu Dokumen',
                        'count' => $diproses,
                        'color' => '#fff7e8',
                        'txt-color' => '#faad14 ',
                        'modal' => 'modalMenunggu',
                    ],
                    [
                        'title' => 'Selesai',
                        'count' => $selesai,
                        'color' => '#eef9e8',
                        'txt-color' => '#52c41a',
                        'modal' => 'modalSelesai',
                    ],
                    [
                        'title' => 'Ditolak',
                        'count' => $ditolak,
                        'color' => '#ffeded',
                        'txt-color' => '#ff4d4f',
                        'modal' => 'modalDitolak',
                    ],
                ];
            @endphp

            <div class="d-flex">
                @foreach ($cards as $card)
                    <div class="px-2 col-3">
                        <div class="mb-4 text-white card" data-bs-toggle="modal" data-bs-target="#{{ $card['modal'] }}">
                            <div style="background-color:{{ $card['color'] }}" class="text-center card-header status">
                                <h5 style="color:{{ $card['txt-color'] }};font-size: 16px" class="m-0 card-title">
                                    {{ $card['title'] }}</h5>
                            </div>
                            <div class="text-center card-body">
                                <h3 style="font-weight: 800">{{ $card['count'] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Row 2: Tombol Ajukan Surat -->
            <div class="my-4 text-center">
                <button type="button" class="btn btn-primary btn-hover-active" id="btnAjukanSurat" data-bs-toggle="popover"
                    data-bs-html="true" data-bs-placement="bottom">
                    + Ajukan Surat Baru
                </button>
            </div>


            <!-- Row 3: Riwayat Pengajuan & Notifikasi -->
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="px-3 py-2 mb-0 card-title">Riwayat Pengajuan Surat Terbaru</h5>
                        </div>
                        <div class="px-4 pb-4">
                            <table class="table p-2 my-0 table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Dokumen</th>
                                        <th>Detil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surats as $surat)
                                        <tr>
                                            <td>{{ $surat->id_surat }}</td>
                                            <td>{{ $surat->type_surat }}</td>
                                            <td>{{ $surat->created_at }}</td>
                                            <td>
                                                {{-- <span class="badge bg-success">Selesai</span> --}}
                                                {{ $surat->status_label }}
                                            </td>
                                            <td style="width:13%">
                                                @if ($surat->status == 'doc_available' or $surat->status == 'completed')
                                                    <a href="{{ route('surat.view', $surat->id_surat) }}" target="_blank"
                                                        class="btn btn-primary">
                                                        {{-- View --}}
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('surat.download', $surat->id_surat) }}"
                                                        class="btn btn-success">
                                                        {{-- Download --}}
                                                        <i class="align-middle" data-feather="download"></i>
                                                    </a>
                                                @else
                                                    No File
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal" data-role="mhs"
                                                    data-surat="{{ $surat->type_surat }}"
                                                    data-idsurat="{{ $surat->id_surat }}">
                                                    @if ($surat->status == 'pending')
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    @else
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    @endif
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

            <div class="row">

                <!-- Notifikasi -->
                {{-- <div class="col-md-4">
            <div class="mb-4 card">
                <div class="text-white card-header bg-secondary">Notifikasi</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Surat Keterangan Lulus telah selesai</li>
                        <li class="list-group-item">Surat Keterangan Mahasiswa Aktif menunggu ACC</li>
                        <li class="list-group-item">Surat Pengantar Tugas sedang diproses</li>
                    </ul>
                </div>
            </div>
        </div> --}}
            </div>
        </div>

        <!-- Modal Detail Surat Mahasiswa -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>

        {{--    @foreach ($surats as $surat) --}}
        <!-- Modal Detail Surat -->
        {{--        <div class="modal fade" id="modalDetail{{ $surat->id_surat }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $surat->id_surat }}" aria-hidden="true"> --}}
        {{--            <div class="modal-dialog modal-dialog-scrollable"> --}}
        {{--                <div class="modal-content"> --}}

        {{--                    <div class="modal-header"> --}}
        {{--                        <h5 class="modal-title" id="modalDetailLabel{{ $surat->id_surat }}">Detail Surat: {{ $surat->type_surat }}</h5> --}}
        {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button> --}}
        {{--                    </div> --}}

        {{--                    <div class="modal-body"> --}}
        {{--                        <p><strong>Jenis Surat:</strong> {{ $surat->type_surat }}</p> --}}
        {{--                        <p><strong>Tanggal Pengajuan:</strong> {{ $surat->created_at->format('d-m-Y') }}</p> --}}
        {{--                        <p><strong>Status:</strong> {{ $surat->status_label }}</p> --}}
        {{--                        <p><strong>Dokumen:</strong> {{ $surat->dokumen ?? 'Tidak ada dokumen' }}</p> --}}

        {{--                        --}}{{-- Tambahkan detail lain sesuai kebutuhan --}}
        {{--                    </div> --}}

        {{--                    <div class="modal-footer d-flex justify-content-between"> --}}
        {{--                        --}}{{-- Tombol Update --}}
        {{--                        <form action="{{ route('surat.update', $surat->id_surat) }}" method="POST"> --}}
        {{--                            @csrf --}}
        {{--                            @method('PUT') --}}
        {{--                            <input type="hidden" name="status" value="revisi"> --}}
        {{--                            <button type="submit" class="btn btn-warning"> --}}
        {{--                                <i class="fa fa-edit me-1"></i> Update Status --}}
        {{--                            </button> --}}
        {{--                        </form> --}}

        {{--                        --}}{{-- Tombol Hapus --}}
        {{--                        <form action="{{ route('surat.destroy', $surat->id_surat) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pengajuan surat ini?');"> --}}
        {{--                            @csrf --}}
        {{--                            @method('DELETE') --}}
        {{--                            <button type="submit" class="btn btn-danger"> --}}
        {{--                                <i class="fa fa-trash me-1"></i> Hapus Surat --}}
        {{--                            </button> --}}
        {{--                        </form> --}}
        {{--                    </div> --}}

        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}
        {{--    @endforeach --}}
    @endsection



    @section('ExtraJS')
        <script src="{{ asset('js/edit-surat.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const trigger = document.querySelector('#btnAjukanSurat');

                const popoverBox = document.createElement('div');
                popoverBox.id = 'customPopover';
                popoverBox.innerHTML = `
            <div class="border-0 shadow-sm card">
                <div class="gap-2 p-3 card-body d-flex flex-column">
                    <a href="{{ route('form-sk-mhs-aktif') }}" class="btn btn-outline-primary w-100">Surat Keterangan Mahasiswa Aktif</a>
                    <a href="{{ route('form-sp-tugas-mk') }}" class="btn btn-outline-primary w-100">Surat Pengantar Tugas Mata Kuliah</a>
                    <a href="{{ route('form-sk-lulus') }}" class="btn btn-outline-primary w-100">Surat Keterangan Lulus</a>
                    <a href="{{ route('form-lhs') }}" class="btn btn-outline-primary w-100">Laporan Hasil Studi</a>
                </div>
            </div>
        `;
                popoverBox.style.position = 'absolute';
                popoverBox.style.zIndex = 1000;
                popoverBox.style.display = 'none';
                popoverBox.style.width = '260px';

                document.body.appendChild(popoverBox);

                let isVisible = false;

                trigger.addEventListener('click', function(e) {
                    e.stopPropagation(); // biar tidak langsung ditutup
                    const rect = trigger.getBoundingClientRect();
                    const leftPos = rect.left + (rect.width / 2) - (260 / 2);

                    popoverBox.style.top = `${window.scrollY + rect.bottom + 8}px`;
                    popoverBox.style.left = `${leftPos}px`;

                    isVisible = !isVisible;
                    popoverBox.style.display = isVisible ? 'block' : 'none';
                });

                // Tutup saat klik di luar popover
                document.addEventListener('click', function(e) {
                    if (!popoverBox.contains(e.target) && e.target !== trigger) {
                        popoverBox.style.display = 'none';
                        isVisible = false;
                    }
                });
            });
        </script>


@endsection
