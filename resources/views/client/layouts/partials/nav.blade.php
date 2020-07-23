<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation-bar">

    <div class="container">
        <a href="{{route('home')}}">
          {{-- <img class="navbar-logo text-center my-1" src="/img/generic/logo-new.png" alt="Asare Sports"> --}}
          <img class="navbar-logo text-center my-1" src="{{asset('img/generic/logo-new.png')}}" alt="Asare-Sports">
        </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
      
          <li class="nav-item home mx-3 {{ ( Request::is('/') ) ? 'active' : '' }}">
            <a class="nav-link nanum" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item mx-3 {{ ( Request::is('about-us') ) ? 'active' : '' }}">
            <a class="nav-link nanum" href="{{route('about-us')}}">About Us</a>
          </li>

          <li class="nav-item mx-3 {{ ( Request::is('teams') || Request::is('teams/*') ) ? 'active' : '' }}">
            <a class="nav-link nanum" href="{{route('teams.index')}}">Teams</a>
          </li>

          <li class="nav-item mx-3 {{ ( Request::is('players') || Request::is('players/*') ) ? 'active' : '' }}">
            <a class="nav-link nanum" href="{{route('players.index')}}">Players</a>
          </li>

          @if(!current_admin())
            <li class="nav-item mx-3">
              <a class="nav-link nanum" href="{{route('login.show')}}">Log In</a>  
            </li>
          @else
            <li class="nav-item mx-3 {{ ( Request::is('profile') || Request::is('profile/*') ) ? 'active' : '' }}">
              <a class="nav-link nanum" href="{{route('player.profile', current_admin()->id)}}">Profile</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link nanum" href="{{route('logout')}}">Log Out</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
    
  </nav>
</header>
