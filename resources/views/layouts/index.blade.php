<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/logo/Suratin.svg') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    @yield('ExtraCSS')

    <title>SuratIn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        {{-- NAVBAR --}}

        @auth
            @include('layouts.partials.sidebar')
        @endauth


        {{-- <div class="pc-container">
            <div class="pc-content">
                @yield('content')

            </div>
        </div> --}}
        <div class="main" style="overflow:auto">
            @auth
                @include('layouts.partials.navbar')
            @endauth

            <main class="content">
                @yield('content')
            </main>

            @include('layouts.partials.footer')
        </div>
    </div>

    {{-- <script src="{{ asset('js/app2.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    @yield('ExtraJS')

    {{-- <script src="{{ asset('js/box.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
