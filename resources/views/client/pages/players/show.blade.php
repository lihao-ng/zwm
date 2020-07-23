@extends('client.layouts.master')

@section('meta-content')
  <title>Players | {{ config('app.name') }}</title>
@endsection

@section('content')
  <player-show-component v-bind:player="{{json_encode($player)}}"></player-show-component>
@endsection
