<nav class="navbar navbar-expand-md">
  <div class="navbar-logo-wrapper">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/generic/logo-dark.png') }}" alt="Template Logo" >
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
          <a class="nav-link fs-18 {{ active_route('dashboard') }}" href="{{ route('dashboard') }}">
            <i class="fal fa-home-lg-alt"></i>
            Dashboard
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('accepting-items') }}" href="{{ route('accepting-items.index') }}">
            <i class="fal fa-trash"></i>
            Accepting Items
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('offers') }}" href="{{ route('offers.index') }}">
            <i class="fal fa-ticket"></i>
            Offers
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_route('award-points') }}" href="{{ route('award-points.index') }}">
            <i class="fal fa-calculator"></i>
            Award Points
          </a>
        </li>
        
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
