<nav class="emcq-sidebar">
	<div class="inner">
		<ul class="sidebar-links">
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18 {{ active_url('admin/dashboard') }}" href="{{ route('admin.dashboard') }}">
					<i class="fal fa-home-lg-alt"></i>
					Dashboard
				</a>
      </li>
      
      @if(current_user()->role_id == 1)
        <li class="sidebar-nav-item">
          <a class="sidebar-nav-link fs-18  {{ active_url('admin/guides') }}"
            href="{{ route('admin.guides.index') }}">
            <i class="fal fa-book"></i>
            Guides
          </a>
        </li>
      @endif

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('admin/merchants') }}"
          href="{{ route('admin.merchants.index') }}">
          <i class="fal fa-building"></i>
          Merchants
        </a>
      </li>

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('admin/users') }}"
          href="{{ route('admin.users.index') }}">
          <i class="fal fa-users"></i>
          Users
        </a>
      </li>

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('admin/profile') }}"
          href="{{ route('admin.profile') }}">
          <i class="fal fa-chess-king-alt"></i>
          Profile
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