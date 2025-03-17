@extends('layouts.index')
@section('content')
    Admin
    <h1 class="mb-3 h3">
        {{-- Ketua Program Studi --}}
        Dashboard
    </h1>



    <div class="p-2 table_component rounded-4" role="region" tabindex="0">


        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="px-3 py-2 mb-0 card-title">Users</h5>
                    </div>
                    <div class="px-4 pb-4">
                        <table class="table p-2 my-0 table-hover">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Role</th>
                                    <th class="">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $user->email }}</td>
                                    {{-- <td class="d-none d-xl-table-cell">{{ $user->alamat }}</td> --}}
                                    <td class="d-none d-xl-table-cell">{{ $user->getRole->name_role }}</td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-surat = "sk_tugas_mk"
                                            id="loadSurat001">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                        <a href="{{ route('user.delete', $user->nip) }}" type="button"
                                            class="delete-button btn btn-danger">
                                            <i class="align-middle" data-feather="delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
console.log("test")
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-button").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah navigasi langsung

            let deleteUrl = this.getAttribute("href");

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                reverseButtons: true    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl; // Redirect ke URL delete
                }
            });
        });
    });
});

</script>
@endsection
