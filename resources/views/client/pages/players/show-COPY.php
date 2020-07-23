@extends('client.layouts.master')

@section('content')
  <section id="showcase-players" class="bg-grey-ft-white">
    <div class="container text-center">

      <div class="players-show-slider">
        <div class="showcase-players">
          <div class="show-players row">
            <div class="col-sm-6 col-md-5 col-lg-4">
              <div class="showcase-player-slider">
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
              </div>
            </div>
            <div class="player-desc col-sm-6 col-md-6">
              <h1 class="player-name ecd fs-50 font-weight-bold"><span class="firstname">James</span><br><span class="lastname">Sinole</span></h1>
              <p class="nanum fs-20 mt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
            </div>
          </div>
        </div>
        <div class="showcase-players">
          <div class="show-players row">
            <div class="col-sm-6 col-md-5 col-lg-4">
              <div class="showcase-player-slider">
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
              </div>
            </div>
            <div class="player-desc col-sm-6 col-md-6">
              <h1 class="player-name ecd fs-50 font-weight-bold"><span class="firstname">James</span><br><span class="lastname">Sinole</span></h1>
              <p class="nanum fs-20 mt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
            </div>
          </div>
        </div>
        <div class="showcase-players">
          <div class="show-players row">
            <div class="col-sm-6 col-md-5 col-lg-4">
              <div class="showcase-player-slider">
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
                <div class="showcase-pic">
                  <img class="player-pic" src="{{ asset('img/players/player1.jpg') }}" alt="Player">
                </div>
              </div>
              
            </div>
            <div class="player-desc col-sm-6 col-md-6">
              <h1 class="player-name ecd fs-50 font-weight-bold"><span class="firstname">James</span><br><span class="lastname">Sinole</span></h1>
              <p class="nanum fs-20 mt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
            </div>
          </div>
        </div>
      </div>

      <div class="player-stats">
        <h2 class="blue fs-40 lp-16 ecd fw_med mb-n3 font-weight-bold" align="center">
          STATISTICS
        </h2>
        <hr width="7%" align="center">
      </div>
       <div class="row mt-5 justify-content-between">
        <div class="col-md-6 mr-lg-n5">
          <player-radar-chart></player-radar-chart>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center pb-3">
          <div class="player-career tab-pane">
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Origin</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">Spain</p>
              </div>
            </div>
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Birth</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">1989-Present</p>
              </div>
            </div>
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Experience</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">20 years</p>
              </div>
            </div>
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Qualification</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">National</p>
              </div>
            </div>
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Rank</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">Pro</p>
              </div>
            </div>
            <div class="black-stats">
              <div class="label">
                <p class="mb-0 fs-20 nanum">Position</p>
              </div>
              <div class="description">
                <p class="mb-0 fs-16 nanum">GK</p>
              </div>
            </div>
          </div>
        </div>
       </div> 
        <div class="row d-flex align-items-center justify-content-center mb-5">
          <div class="player-tabs">
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
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">Year</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">Club</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">1991-2001</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">Incheon United Youth</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">2002-2003</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">FB Barcelona Youth</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">2004-2006</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">Hellas Verona</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">2006-2010</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">Sint Truidense</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">2010-2013</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">National Team Korea</p>
                  </div>
                </div>
                <div class="bottom-white">
                  <div class="year">
                    <p class="mb-0 white fs-20 nanum">2013-2018</p>
                  </div>
                  <div class="club">
                    <p class="mb-0 white fs-16 nanum">National Team Japan</p>
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
</section>
@endsection
