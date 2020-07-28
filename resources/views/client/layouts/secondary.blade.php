@extends('client.layouts.partials.main')

@section('master')
	<div class="auth-wrapper">
    <div class="auth-row">
      <div class="auth-col left-col order-2 order-md-1">
        <div class="auth-content not-form">
          <h2 class="fs-30 lp-25">Welcome to ZWM</h2>
        </div>
      </div>
      <div class="auth-col right-col order-1 order-md-2">
        <div class="auth-content form">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

	@include('client.layouts.partials.notification')
@endsection
