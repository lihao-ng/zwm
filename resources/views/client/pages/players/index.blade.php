@extends('client.layouts.master')

@section('meta-content')
  <title>Players | {{ config('app.name') }}</title>
@endsection

@section('content')

  {{-- {{dd( json_encode($players) )}} --}}

  <player-index-component :regions="{{$regions}}" :leagues="{{$leagues}}"></player-index-component>

@endsection
