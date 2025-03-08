@extends('layouts.index')
@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Forms</h1>
    </div>

    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">NIP</h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Name</h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Email</h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Password</h5>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Input">
            </div>
        </div>
    </div>
</div>


@endsection
