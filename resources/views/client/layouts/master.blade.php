@extends('client.layouts.partials.main')

@section('master')
	@include('client.layouts.partials.navbar')
	{{-- <v-dialog></v-dialog> --}}
	<main class="logged-in">
		<section class="main-left">
			@include('client.layouts.partials.sidebar')
		</section>
		<section class="main-right">
			{{-- <notification-component></notification-component> --}}
			@include('client.layouts.partials.notification')
			@yield('content')
		</section>
	</main>
@endsection

@push('styles')
	<style>
		.alert-admin-position-mod{
			position: relative;
			top: 0;
			left: 0;
		}
	</style>
@endpush
