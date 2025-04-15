@extends('layouts.index')

@section('ExtraCSS')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection


@section('content')
Admin
<h1 class="mb-3 h3">
    {{-- Ketua Program Studi --}}
    Dashboard
</h1>

<div class="p-2 table_component rounded-4" role="region" tabindex="0">
    <div class="search-wrapper">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search...">
        </div>
    </div>

    {{-- @include('layouts.partials.search') --}}


    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="px-3 py-2 mb-0 card-title">Users</h5>
                </div>
                <div class="px-4 pb-4">
                    <table id="usersTable" class="table p-2 my-0 table-hover">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th class="">Role</th>
                                <th class="">Detil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-none d-xl-table-cell">{{ $user->getProdi->name_prodi ?? 'None' }}</td>
                                <td>{{ $user->getRole->name_role ?? 'Inactive' }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal" data-type="user" data-id="{{ $user->nip }}"
                                        id="{{ $user->nip }}">
                                        <i class="align-middle" data-feather="edit"></i>
                                    </button>
                                    <a href="#" class="delete-button btn btn-danger"
                                        data-url="{{ route('user.delete', $user->nip) }}">
                                        <i class="align-middle" data-feather="delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="mt-4"> --}}
                        {{-- {{ $users->links() }} --}}
                        {{-- </div> --}}
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h5 class="modal-title" id="suratDetailTitle">Edit Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="suratDetailBody">
                    <div class="content-asal">
                        <p>Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('ExtraJS')
<script></script>
<script src="{{ asset('js/box.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("test");
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(e) {
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

    @if (session('status'))
    $.notify({
        message: "{{ session('status') }}"
    }, {
        delay:5000,
        type: "info"
    })
    @endif
</script>

<script>
const modal = document.getElementById("myModal");

modal.addEventListener("click", function (e) {
    const disableButton = e.target.closest(".disable-button");
    const deleteButton = e.target.closest(".delete-button");

    if (disableButton) {
        e.preventDefault();
        Swal.fire({
            title: "Yakin ingin menonaktifkan akun ini?",
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, nonaktifkan!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = disableButton.dataset.url;
            }
        });
    }

    if (deleteButton) {
        e.preventDefault();
        Swal.fire({
            title: "Hapus item ini?",
            text: "Item akan dihapus secara permanen!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteButton.dataset.url;
            }
        });
    }
});

</script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
                $('.table').DataTable({
                    "paging": true,
                    "searching": false,
                    "ordering": false,
                    "info": true
                });
            });
</script>

@endsection
