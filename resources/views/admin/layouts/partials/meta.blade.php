<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}"> --}}
<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}">
<link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('img/favicon/favicon.ico') }}">
<link rel="icon" type="image/png" sizes="196x196" href="{{ asset('img/favicon/favicon-192.png') }}">
<link rel="icon" type="image/png" sizes="160x160" href="{{ asset('img/favicon/favicon-160.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96.png') }}">
<link rel="icon" type="image/png" sizes="64x64" href="{{ asset('img/favicon/favicon-64.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon') }}/favicon-16.png">
<link rel="apple-touch-icon" href="{{ asset('img/favicon/favicon-57.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/favicon-114.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/favicon-72.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/favicon-144.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/favicon-60.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/favicon-120.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/favicon-76.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/favicon-152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/favicon-180.png') }}">
<link rel="manifest" href="{{ asset('mix-manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.pngg') }}">
<meta name="theme-color" content="#ffffff">

@yield('meta-content')

{{-- font awesome 5 pro --}}
<script src="https://kit.fontawesome.com/7216ae72d8.js" crossorigin="anonymous"></script>

<!-- Styles -->
<link href="{{ mix('css/admin.css') }}" rel="stylesheet">
@stack('styles')
