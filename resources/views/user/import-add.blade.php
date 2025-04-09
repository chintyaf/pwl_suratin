@extends('layouts.index')
@section('content')

<div class="p-0 container-fluid">
    <form method="post" enctype="multipart/form-data" action="{{ route('user.importStore') }}">
        @csrf
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control-file" name="excel_file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
