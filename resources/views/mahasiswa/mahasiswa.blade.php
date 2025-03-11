<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Dashboard Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Flatpickr CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
        {{-- NAVBAR --}}
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">AdminKit</span>
                </a>
        
                {{-- <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        User
                    </li>
        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('add-account') }}">
                            <span class="align-middle">
                                Buat Akun
                            </span>
                        </a>
                    </li>
                </ul>
        
        
         --}}
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Form Surat
                    </li>
        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <!-- <i class="align-middle" data-feather="sliders"></i> -->
                            <span class="align-middle">
                                Surat Keterangan Mahasiswa Aktif
                            </span>
                        </a>
                    </li>
        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <!-- <i class="align-middle" data-feather="sliders"></i> -->
                            <span class="align-middle">
                                Surat Pengantar Tugas Mata Kuliah
                            </span>
                        </a>
                    </li>
        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <!-- <i class="align-middle" data-feather="sliders"></i> -->
                            <span class="align-middle">
                                Surat Keterangan Lulus
                            </span>
                        </a>
                    </li>
        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <!-- <i class="align-middle" data-feather="sliders"></i> -->
                            <span class="align-middle">
                                Laporan Hasil Studi
                            </span>
                        </a>
                    </li>
        
            </div>
        </nav>


		<div class="main">
            @include('layouts.partials.navbar')


			<main class="content">
                {{-- <p>
                    Main > Form
                </p> --}}
                @yield('content')
			</main>

            {{-- @include('layouts.partials.footer') --}}

		</div>
	</div>

	{{-- <script src="{{ asset('js/app2.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    @yield('ExtraJS')

	<script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Inisialisasi Datepicker -->
    <script>
        flatpickr("#datepicker", {
            dateFormat: "d-m-Y",
            allowInput: true
        });
    </script>


</body>

</html>
