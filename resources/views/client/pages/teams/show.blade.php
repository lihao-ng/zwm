@extends('client.layouts.master')

@section('meta-content')
  <title>Teams | {{ config('app.name') }}</title>
@endsection

@section('content')
<section class="bg-grey-ft-white">
  
  {{-- <a class="close-button" href="{{ route('teams.index') }}"><i class="fal fa-times orange"></i></a> --}}

  <team-show-component :team="{{json_encode($team)}}"></team-show-component>

</section>

@endsection
