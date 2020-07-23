@extends('client.layouts.partials.meta')

@section('master')
  @include('client.layouts.partials.nav')
  <main>
  	@include('client.layouts.partials.notification')
    @yield('content')
  </main>
  @include('client.layouts.partials.footer')
@endsection