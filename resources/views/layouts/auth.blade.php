<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Pabrik Gula Mrican' }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <style>
        .bg-image {
            background-image: url('https://imgs.search.brave.com/7GSpZ9qh_M0F8_GYvGfKatfhNEoTGUvZvSuewrG-S_Q/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zaW5l/cmdpZ3VsYS5jb20v/X25leHQvaW1hZ2U_/dXJsPS9pbWFnZXMv/dW5pdGtlcmphL3Bn/bWVyaXRqYW4uanBn/Jnc9MTkyMCZxPTc1');
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.5; /* Atur nilai opacity sesuai keinginan (0.0 - 1.0) */
            z-index: -1;
        }
        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="bg-image"></div>
    @yield('main-content')
<!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
