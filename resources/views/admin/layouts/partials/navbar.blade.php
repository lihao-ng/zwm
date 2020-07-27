<nav class="navbar navbar-expand-md">
  <div class="navbar-logo-wrapper">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/ZWM_logo.png') }}" alt="Template Logo" >
    </a>
  </div>
	{{-- <notification-container></notification-container> --}}
  <button class="navbar-toggler collapsed" data-target="#emcq-navbar" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar top-bar"></span>
    <span class="icon-bar middle-bar"></span>
    <span class="icon-bar bottom-bar"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="emcq-navbar">
    <div class="inner">
      <ul class="navbar-nav">
        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
            <i class="fal fa-home-lg-alt"></i>
            Dashboard
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('admin.merchants.index') }}"
            href="{{ route('admin.merchants.index') }}">
            <i class="fal fa-building"></i>
            Merchants
          </a>
        </li>

        {{-- <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ ( Request::is('admin/players') || Request::is('admin/players/*') ) ? 'active' : '' }}" href="#player_submenu1" data-toggle="collapse"  data-target="#player_submenu1">
            <i class="fal fa-running"></i>
            Players
          </a>
          <div class="collapse" id="player_submenu1" aria-expanded="false">
            <ul class="flex-column nav pl-3 pt-2">
              <li class="py-2">
                <a class="sidebar-nav-link fs-18" href="{{ route('admin.players.index') }}">
                  <i class="fal fa-check-circle"></i>
                  Verified
                </a>
              </li>
              <li class="py-2">
                <a class="sidebar-nav-link fs-18" href="{{ route('admin.players.verification') }}">
                  <i class="fal fa-question-circle"></i>
                    Unverified
                </a>
              </li>
            </ul>
          </div> 
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ ( Request::is('admin/regions') || Request::is('admin/regions/*') ) ? 'active' : '' }}" href="{{ route('admin.regions.index') }}">
            <i class="fal fa-ball-pile"></i>
            Regions
          </a>
        </li>
        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ ( Request::is('admin/leagues') || Request::is('admin/leagues/*') ) ? 'active' : ''}}" href="{{ route('admin.leagues.index') }}">
            <i class="fal fa-fist-raised"></i>
            Leagues
          </a>
        </li>
        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ ( Request::is('admin/directors') || Request::is('admin/directors/*') ) ? 'active' : ''}}" href="{{ route('admin.directors.index') }}">
            <i class="fal fa-fist-raised"></i>
            Directors
          </a>
        </li>
        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('admin.profile') }}" href="{{ route('admin.profile') }}">
            <i class="fal fa-chess-king-alt"></i>
            Profile
          </a>
        </li> --}}
        <li class="nav-item mobile">
          <a class="nav-link fs-18" href="#">
            <i class="fal fa-sign-out"></i>
            Log Out
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
