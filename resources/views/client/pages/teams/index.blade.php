@extends('client.layouts.master')

@section('meta-content')
  <title>Teams | {{ config('app.name') }}</title>
@endsection

@section('content')
  <section class="all-teams bg-white-grey">
    <div class="container text-center all-teams-container">
      <h2 class="nanum twin-headings small font-weight-bold">THE</h2>
      <h1 class="ecd twin-headings big red">TEAMS</h1>
      <div class="text-center">
        <img class="bullseye mb-3" src="{{asset('./img/homepage/bullseye.png')}}" alt="Borderline">
      </div>

      <team-index-component
        :regions="{{$regions}}"
        :leagues="{{$leagues}}"
      ></team-index-component>
      
    </div>
  </section>
@endsection
