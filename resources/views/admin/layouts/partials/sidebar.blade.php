<nav class="emcq-sidebar">
	<div class="inner">
		<ul class="sidebar-links">
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18 {{ active_route('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
					<i class="fal fa-home-lg-alt"></i>
					Dashboard
				</a>
			</li>
			{{-- @route_exists('admin.inquiries.index')
				<li class="sidebar-nav-item">
					<a class="sidebar-nav-link fs-18 {{ active_route('admin.inquiries.index') }}"
						href="{{ route('admin.inquiries.index') }}">
						<i class="fal fa-envelope-open-text"></i>
						Inquiries
					</a>
				</li>
			@endroute_exists --}}

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

@push('scripts')

	<script>

		var sidebarPlayerBtn = document.getElementById("sidebar_player_btn");
		var sidebarPlayerBtnIcon2 = document.getElementById("sidebar_player_btn_icon2");
		var sidebarPlayerSubMenu = document.getElementById("player_submenu1");

		sidebarPlayerBtn.addEventListener("click", () => {
			if(!sidebarPlayerSubMenu.classList.contains("show")){
				sidebarPlayerBtnIcon2.classList.remove("fa-angle-down");
				sidebarPlayerBtnIcon2.classList.add("fa-angle-up");
			}
			else{
				sidebarPlayerBtnIcon2.classList.remove("fa-angle-up");
				sidebarPlayerBtnIcon2.classList.add("fa-angle-down");
			}
		});

	</script>	

@endpush
