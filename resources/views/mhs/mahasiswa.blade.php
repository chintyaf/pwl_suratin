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
    <style>
        /* Warna saat dihover */
        .btn-hover-active:hover {
            background-color: #12978e !important; /* Warna biru lebih gelap */
            border-color: #008578 !important;
        }

        /* Warna saat diklik (aktif) */
        .btn-hover-active:active,
        .btn-hover-active:focus {
            background-color: #92c2c1 !important; /* Warna biru lebih gelap lagi */
            border-color: #9fc7ca !important;
        }
    </style>
</head>

<body>
	<div class="wrapper">
        {{-- NAVBAR --}}
        @include('layouts.partials.sidebar_mhs')

        	<div class="main">
            @include('layouts.partials.navbar_mhs')


			<main class="content">
                {{-- <p>
                    Main > Form
                </p> --}}
                @yield('content')
			</main>

            {{-- @include('layouts.partials.footer') --}}

		</div>
	</div>

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
