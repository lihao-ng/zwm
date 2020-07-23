@extends('client.layouts.master')

@section('meta-content')
  <title>Login | {{ config('app.name') }}</title>
@endsection


@section('content')
  <login-component></login-component>
@endsection
