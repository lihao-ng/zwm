<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon/favicon-144.png') }}">
    <meta name="msapplication-config" content="{{ asset('img/favicon/browserconfig.xml') }}">
    @yield('meta-content')
		<!-- Material Icons -->

    {{-- font awesome 5 pro --}}
    <script src="https://kit.fontawesome.com/7216ae72d8.js" crossorigin="anonymous"></script>

	  <!-- Styles -->
	  <link href="{{ mix('css/client.css') }}" rel="stylesheet">
	</head>
	<body>
		<!-- ايمن ساسي -->
		@stack('cookies')
		{{-- Body Content --}}
		<div id="client-app">
			@yield('master')
		</div>

	  <!-- Scripts -->
		<script src="{{ asset('js/client.js') }}"></script>
	  @stack('scripts')
	</body>
</html>
