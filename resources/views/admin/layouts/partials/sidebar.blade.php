<nav class="emcq-sidebar">
	<div class="inner">
		<ul class="sidebar-links">
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18 {{ active_url('dashboard') }}" href="{{ route('admin.dashboard') }}">
					<i class="fal fa-home-lg-alt"></i>
					Dashboard
				</a>
      </li>
      
    
      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('merchants') }}"
          href="{{ route('admin.merchants.index') }}">
          <i class="fal fa-building"></i>
          Merchants
        </a>
      </li>

			{{-- <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1"><span>Customers</span></a>
			<div class="collapse" id="submenu1sub1" aria-expanded="false">
				<ul class="flex-column nav pl-4">
					<li class="nav-item">
						<a class="nav-link p-1" href="#">
							<i class="fa fa-fw fa-clock-o"></i> Daily 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link p-1" href="#">
							<i class="fa fa-fw fa-dashboard"></i> Dashboard 
						</a>
					</li>
					<li class="nav-item">
							<a class="nav-link p-1" href="#">
									<i class="fa fa-fw fa-bar-chart"></i> Charts </a>
					</li>
					<li class="nav-item">
							<a class="nav-link p-1" href="#">
									<i class="fa fa-fw fa-compass"></i> Areas </a>
					</li>
				</ul>
			</div> --}}
		
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18" href="{{ route('admin.logout') }}">
					<i class="fal fa-sign-out"></i>
					Log Out
				</a>
			</li>
		</ul>
	</div>
</nav>