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
          <a class="nav-link fs-18 {{ active_url('dashboard') }}" href="{{ route('dashboard') }}">
            <i class="fal fa-home-lg-alt"></i>
            Dashboard
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_url('accepting-items') }}" href="{{ route('accepting-items.index') }}">
            <i class="fal fa-trash"></i>
            Accepting Items
          </a>
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_url('offers') }} {{ active_url('promo-codes') }}" href="#offer_submenu1" data-toggle="collapse"  data-target="#offer_submenu1">
            <i class="fal fa-bars"></i>
            Offers
          </a>
          <div class="collapse" id="offer_submenu1" aria-expanded="false">
            <ul class="flex-column nav pl-3 pt-2">
              <li class="py-2">
                <a class="sidebar-nav-link fs-18 {{ active_url('offers') }}" href="{{ route('offers.index') }}">
                  <i class="fal fa-percent"></i>
                  Coupons
                </a>
              </li>
              <li class="py-2">
                <a class="sidebar-nav-link fs-18 {{ active_url('promo-codes') }}" href="{{ route('promo-codes.index') }}">
                  <i class="fal fa-ticket"></i>
                    Promo code
                </a>
              </li>

              <li class="py-2">
                <a class="sidebar-nav-link fs-18 {{ active_url('redemption') }}" href="{{ route('promo-codes.redemption.show') }}">
                  <i class="fal fa-ticket"></i>
                    Redemption
                </a>
              </li>
            </ul>
          </div> 
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_url('categories') }} {{ active_url('products') }}" href="#offer_submenu2" data-toggle="collapse"  data-target="#offer_submenu2">
            <i class="fal fa-shopping-bag"></i>
            Goods
          </a>
          <div class="collapse" id="offer_submenu2" aria-expanded="false">
            <ul class="flex-column nav pl-3 pt-2">
              <li class="py-2">
                <a class="sidebar-nav-link fs-18 {{ active_url('categories') }}" href="{{ route('categories.index') }}">
                  <i class="fal fa-sitemap"></i>
                    Categories
                </a>
              </li>

              <li class="py-2">
                <a class="sidebar-nav-link fs-18 {{ active_url('products') }}" href="{{ route('products.index') }}">
                  <i class="fal fa-shopping-basket"></i>
                    Products
                </a>
              </li>
            </ul>
          </div> 
        </li>

        <li class="nav-item mobile">
          <a class="nav-link fs-18 {{ active_url('award-points') }}" href="{{ route('award-points.index') }}">
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
