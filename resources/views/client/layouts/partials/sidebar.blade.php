<nav class="emcq-sidebar">
	<div class="inner">
		<ul class="sidebar-links">
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18 {{ active_route('dashboard') }}" href="{{ route('dashboard') }}">
					<i class="fal fa-home-lg-alt"></i>
					Dashboard
				</a>
      </li>
      
			<li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('accepting-items') }}"
          href="{{ route('accepting-items.index') }}">
          <i class="fal fa-trash"></i>
          Accepting Items
        </a>
      </li>

      <li class="sidebar-nav-item">
				<a id="sidebar_offer_btn" class="sidebar-nav-link fs-18 {{ active_url('offers') }} {{ active_url('promo-codes') }}" href="#offer_submenu1" data-toggle="collapse" data-target="#offer_submenu1" >
					<i class="fal fa-bars"></i>
					Offers
					<i id="sidebar_offer_btn_icon2" class="fal fa-angle-down text-right align-middle"></i>
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
									Promo codes
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

			<li class="sidebar-nav-item">
        <a class="sidebar-nav-link fs-18  {{ active_url('award-points') }}"
          href="{{ route('award-points.index') }}">
          <i class="fal fa-calculator"></i>
          Award Points
        </a>
      </li>
		
			<li class="sidebar-nav-item">
				<a class="sidebar-nav-link fs-18" href="{{ route('logout') }}">
					<i class="fal fa-sign-out"></i>
					Log Out
				</a>
			</li>
		</ul>
	</div>
</nav>

@push('scripts')

	<script>

		var sidebarPlayerBtn = document.getElementById("sidebar_offer_btn");
		var sidebarPlayerBtnIcon2 = document.getElementById("sidebar_offer_btn_icon2");
		var sidebarPlayerSubMenu = document.getElementById("offer_submenu1");

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
