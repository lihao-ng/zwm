@extends('admin.layouts.partials.main')

@section('master')
	@include('admin.layouts.partials.navbar')
	{{-- <v-dialog></v-dialog> --}}
	<main class="logged-in">
		<section class="main-left">
			@include('admin.layouts.partials.sidebar')
		</section>
		<section class="main-right">
			{{-- <notification-component></notification-component> --}}
			@include('admin.layouts.partials.notification')
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
