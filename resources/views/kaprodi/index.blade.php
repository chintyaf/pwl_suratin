@extends('layouts.index')
@section('content')
    Ketua Program Studi



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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Loaded Content</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- Content from snippet.blade.php will load here -->
                        <p>Loading...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.getElementById("loadSnippet").addEventListener("click", () => {
                    let url = "{{ url('/sk-mahasiswa-aktif/detail') }}"; // Default URL

                    // modalContent.innerHTML = ""

                    // Example condition: Change URL dynamically
                    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    fetch(url, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        // body: JSON.stringify({ key: "value" })
                    })
                    .then(res => res.text())
                    .then(data => document.getElementById("modalContent").innerHTML = data)
                    .catch(err => console.error("Error loading content:", err));

                    console.log(data)
                });
            });
        </script>

@endsection
