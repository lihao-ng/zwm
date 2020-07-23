  @extends('client.layouts.master')

  @section('meta-content')
    <title>Player Registration | {{ config('app.name') }}</title>
  @endsection


  @section('content')
    <register-component></register-component>
  @endsection
