@extends('layouts.index')

@section('ExtraCSS')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection


@section('content')
<div class="col-12 row">
    <div class="col-4">
        Admin
        <h1 class="mb-3 h3">
            Mata Kuliah
        </h1>
    </div>


    <div class="col-8 d-flex align-items-center justify-content-end">
        <div>
            <a href="{{ route('mata_kuliah.add') }}" class="btn btn-primary ">
                Tambahkan Mata Kuliah
            </a>
        </div>
    </div>

</div>

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

                    <h5 class="px-3 py-2 mb-0 card-title">Mata Kuliah</h5>
                </div>
                <div class="px-4 pb-4">
                    <table id="usersTable" class="table p-2 my-0 table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%">Kode</th>
                                <th >Nama</th>
                                <th >Program Studi</th>
                                <th style="width: 15%">Detil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->kode_mk }}</td>
                                <td>{{ $data->nama_mk }}</td>
                                <td>{{ $data->getProdi->name_prodi }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        data-url="{{ route('mata_kuliah.edit', $data->kode_mk) }}"
                                        data-id="{{ $data->kode_mk }}"
                                        >
                                        <i class="align-middle" data-feather="edit"></i>
                                    </button>
                                    <a href="#" class="delete-button btn btn-danger"
                                        data-url="{{ route('mata_kuliah.delete', $data->kode_mk) }}">
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
                <div class="modal-header">
                    <h5 class="modal-title" id="boxTitle">Mata Kuliah</h5>
                    <button type="button" class="btn-close"
                    data-bs-dismiss="modal"

                    aria-label="Close"></button>
                </div>
                <div class="modal-body" id="boxContent">
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

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
                $('.table').DataTable({
                    "paging": true,
                    "searching": false,
                    "ordering": false,
                    "info": false
                });
            });
</script>

@endsection
