@extends('client.layouts.master')

@section('content')
<section class="bg-grey-ft-white">
  <a class="close-button" href="{{ route('teams.index') }}"><i class="fal fa-times orange"></i></a>
  <div class="container pt-5">
    <div class="teams-show-slider">
      <div class="teams-slide">
        <img class="slide-img w-100" src="{{asset('img/teams/teams-large.jpg')}}" alt="Team">
        <div class="team-name w-100">
          <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
        </div>
      </div>
      <div class="teams-slide">
        <img class="slide-img w-100" src="{{asset('img/teams/teams-large.jpg')}}" alt="Team">
        <div class="team-name w-100">
          <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
        </div>
      </div>
      <div class="teams-slide">
        <img class="slide-img w-100" src="{{asset('img/teams/teams-large.jpg')}}" alt="Team">
        <div class="team-name w-100">
          <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
        </div>
      </div>
      <div class="teams-slide">
        <img class="slide-img w-100" src="{{asset('img/teams/teams-large.jpg')}}" alt="Team">
        <div class="team-name w-100">
          <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
        </div>
      </div>
    </div>

    <div class="team-stats pt-4">
      <h2 class="blue fs-40 lp-16 ecd fw_med mb-n3" align="center">STATISTICS</h2>
      <hr width="7%" align="center">
      <div class="row mt-5">
        <div class="col-md-6 mr-lg-n5">
          <radar-chart></radar-chart>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <div class="team-tabs w-100">
            <ul class="nav nav-pills justify-content-center text-center">
              <li class="nav-item"><a data-target="#history" data-toggle="tab" class="nav-link fs-16 fw_med" href="">HISTORY</a></li>
              <li class="nav-item"><a data-target="#clubcareer" data-toggle="tab" class="nav-link fs-16 fw_med active" href="">CLUB CAREER</a></li>
              <li class="nav-item"><a data-target="#datasheet" data-toggle="tab" class="nav-link fs-16 fw_med" href="">DATA SHEET</a></li>
            </ul>
            <div class="tab-content mt-3">
              <div id="history" class="tab-pane fade">
                <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div id="clubcareer" class="tab-pane fade active show">
                <div class="bottom-white">
                  <div class="label">
                    <p class="mb-0 white fs-20 nanum">Origin</p>
                  </div>
                  <div class="description">
                    <p class="mb-0 white fs-16 nanum">Spain</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="label">
                    <p class="mb-0 white fs-20 nanum">Established</p>
                  </div>
                  <div class="description">
                    <p class="mb-0 white fs-16 nanum">1811-Present</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="label">
                    <p class="mb-0 white fs-20 nanum">Team N.</p>
                  </div>
                  <div class="description">
                    <p class="mb-0 white fs-16 nanum">20</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="label">
                    <p class="mb-0 white fs-20 nanum">Qualification</p>
                  </div>
                  <div class="description">
                    <p class="mb-0 white fs-16 nanum">National</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="label">
                    <p class="mb-0 white fs-20 nanum">Rank</p>
                  </div>
                  <div class="description">
                    <p class="mb-0 white fs-16 nanum">Pro</p>
                  </div>
                </div>
              </div>
              <div id="datasheet" class="tab-pane fade">
                <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
