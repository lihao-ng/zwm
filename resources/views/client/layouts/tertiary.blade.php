@extends('client.layouts.partials.main')

@section('master')
	<div class="auth-wrapper">
    <div class="auth-row">
      <div class="auth-col right-col container pt-5" style="flex:0 0 70%; max-width:70%;">
        <div class="auth-content form">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

	@include('client.layouts.partials.notification')
@endsection
