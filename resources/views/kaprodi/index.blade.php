@extends('layouts.index')
@section('content')
    <h1 class="mb-3 h3">
        {{-- Ketua Program Studi --}}
        Dashboard
    </h1>



    <div class="p-2 table_component rounded-4" role="region" tabindex="0">

        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="px-3 py-2 mb-0 card-title">Menunggu Persetujuan</h5>
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
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
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
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="" class="button">
                                            Edit
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
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
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class="status"> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="loadSnippet">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="" class="button">
                                            Edit
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>2372002</td>
                                    <td>Jennifer Charity Sharon Lukita</td>
                                    <td class="d-none d-xl-table-cell">Surat Keterangan Aktif</td>
                                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                                    <td><span class=""> Menunggu persetujuan </span></td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="" class="button">
                                            Edit
                                        </a>
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

@endsection
