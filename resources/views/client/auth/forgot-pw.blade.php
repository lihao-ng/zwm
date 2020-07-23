@extends('client.layouts.master')

@section('meta-content')
  <title>Forgot Password | {{ config('app.name') }}</title>
@endsection


@section('content')
<forgotpassword-component></forgotpassword-component>

@endsection
