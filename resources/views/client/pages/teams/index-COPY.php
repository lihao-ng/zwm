@extends('client.layouts.master')

@section('content')
  <section class="all-teams bg-white-grey">
    <div class="container text-center all-teams-container">
      <h2 class="nanum twin-headings small font-weight-bold mb-0">THE</h2>
      <h1 class="ecd twin-headings big red">TEAMS</h1>
      <div class="text-center">
        <img class="bullseye mb-3" src="{{asset('img/homepage/bullseye.png')}}" alt="Borderline">
      </div>
      <div class="d-flex justify-content-center mb-md-n5">
        <div class="dropdown mr-lg-5 mr-2">
          <button class="btn ecd blue lp-16 fs-18 fw_b" type="button" id="filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="dropdown-text">REGION <i class="far fa-angle-down fw_b"></i></span>
          </button>
          <ul class="dropdown-menu scrollable-menu" aria-labelledby="filter">
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Malaysia</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Singapore</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Thailand</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn ecd blue lp-16 fs-18 fw_b" type="button" id="filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="dropdown-text">LEAGUES <i class="far fa-angle-down fw_b"></i></span>
          </button>
          <div class="dropdown-menu scrollable-menu" aria-labelledby="filter">
            <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">League 1</a>
            <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">League 2</a>
            <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">League 3</a>
          </div>
        </div>
      </div>

      <div class="team-photos">
        <div class="row">
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mt-6 px-4">
            <div class="blue-filter">
              <a href="/teams/profile"><img class="w-100" src="{{asset('img/teams/teams.jpg')}}" alt="Team"></a>
              <div class="team-name w-100">
                <h4 class="fs-18 fw_b nanum white">FC UNITED N</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="pagination-icons mt-6 pagination-div" >
        <ul class="pagination">
        <li class="page-item"><a class="page-link arrow" href="#"><i class="fal fa-2x fa-angle-double-left"></i></a></li>
        <li class="page-item mx-2"><a class="page-link arrow" href="#"><i class="fal fa-2x fa-angle-left"></i></a></li>
        <li class="page-item mr-1"><a class="number page-link fs-20" href="#">1</a></li>
        <li class="page-item mr-1"><a class="number page-link fs-20" href="#">2</a></li>
        <li class="page-item mr-1"><a class="number page-link fs-20" href="#">3</a></li>
        <li class="page-item mx-2"><a class="page-link arrow" href="#"><i class="fal fa-2x fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link arrow" href="#"><i class="fal fa-2x fa-angle-double-right"></i></a></li>
        <ul>
      </div>
    </div>
  </section>
@endsection
