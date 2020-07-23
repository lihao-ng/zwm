@extends('client.layouts.master')

@section('meta-content')
  <title>Profile | {{ config('app.name') }}</title>
@endsection

@section('content')

<section class="player-profile">

  <div class="container">
    <div class="row my-4">
      <div class="col-sm-10 align-self-center">
        <h1 class="ecd fs-70 fw-bold">Hi, <span>{{$player->first_name}} {{$player->last_name}}</span></h1>
        {{-- <p class="ecd fs-24 lp-16">Hi, <span>{{$player->first_name}} {{$player->last_name}}</span></p> --}}
      </div>
      <div class="col-sm-2 player-avatar">
        @if($player->avatar == null)
          <img class="w-100" src="{{ asset('images/no_image.jpg')}}" alt="team-image">
        @else
          <img class="w-100" src="{{ asset('storage/images/upload') . '/'. $player->avatar}}" alt="team-image">
        @endif
      </div>
    </div>
  </div>

    
  <player-profile-component
    :is-edit="true"
    :player="{{$player}}"
    :regions="{{$regions}}"
    :leagues="{{$leagues}}"
    :owner-type="'{{$ownerType}}'"
    @if($player->statistic)
      :statistic="{{$player->statistic}}"
    @endif
    @if($player->teams)
      :current-player-teams="{{$player->teams}}"
    @endif
  >
  </player-profile-component>
  
</section>
@endsection