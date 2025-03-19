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
                                    {{-- <th>Jurusan</th> --}}
                                    <th class="">Role</th>
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
                                    <td class="d-none d-xl-table-cell">{{ $user->getRole->name_role ?? 'None' }}</td>
                                    <td class="d-none d-md-table-cell">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-type = "user"
                                            data-id = "{{ $user->nip }}"
                                            id="{{ $user->nip }}">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </button>
                                        <a href="#" class="delete-button btn btn-danger" data-url="{{ route('user.delete', $user->nip) }}">
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
    <script src="{{ asset('js/box.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let url = this.getAttribute('data-url');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#13879b",
                        confirmButtonText: "Yes, delete it!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>


@endsection
