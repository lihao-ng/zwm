@extends('client.layouts.master')

@section('content')

<section class="all-players bg-white-grey">
  <div class="container text-center all-players-container">
    <h2 class="nanum twin-headings small font-weight-bold mb-0">THE</h2>
    <h1 class="ecd twin-headings big red">PLAYERS</h1>
    <div class="text-center">
      <img class="bullseye mb-3" src="{{asset('img/homepage/bullseye.png')}}" alt="Borderline">
    </div>
    <div class="d-flex justify-content-center mb-md-n5">
      <div class="dropdown mr-lg-5 mr-2">
        <button class="btn ecd blue lp-16 fs-18 fw_b" type="button" id="filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="dropdown-text">REGION <i class="far fa-angle-down fw_b"></i></span>
        </button>
        <ul class="dropdown-menu scrollable-menu" aria-labelledby="filter">

          @if( count($regions)>0 )
            @foreach ($regions as $region)
              <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">{{$region->name}}</a></li>
            @endforeach
          @else
            <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">NONE</a></li>
          @endif
          

          {{-- <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Singapore</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Thailand</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li>
          <li><a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">Brazil</a></li> --}}
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn ecd blue lp-16 fs-18 fw_b" type="button" id="filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="dropdown-text"> LEAGUES <i class="far fa-angle-down fw_b"></i></span>
        </button>
        <div class="dropdown-menu scrollable-menu" aria-labelledby="filter">

          @if (count($leagues)>0)
            @foreach ($leagues as $league)  
              <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">{{$league->name}}</a>
            @endforeach
          @else
            <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">NONE</a>
          @endif
          {{-- <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">League 2</a>
          <a class="dropdown-item ecd blue lp-16 fs-18 fw_med" href="#">League 3</a> --}}
        </div>
      </div>
    </div>

    <div class="player-photos">
      <div class="row">

        @foreach($players as $player)
          <div class="col-md-4 col-sm-6 mt-6 img-padding">
            <div class="blue-filter">

              @if($player->avatar == 'no_image')
                <a href="/players/{{$player->id}}"><img class="w-100" src="{{ asset('images/no_image.jpg')}}" alt="player-image"></a>
              @else
                <a href="/players/{{$player->id}}"><img class="w-100" src="{{ asset('storage/images/upload') . '/'. $player->avatar}}" alt="player-image"></a>
              @endif
              <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">{{$player->first_name}} {{$player->last_name}}</h4>
              </div>
            </div>
          </div>
        @endforeach
        

        {{-- <div class="col-md-4 col-sm-6 mt-6 img-padding">
          <div class="blue-filter">
            <a href="/players/profile"><img class="w-100" src="{{asset('img/players/player1.jpg')}}" alt="Player2"></a>
            <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">Aaron Schiner</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mt-6 img-padding">
          <div class="blue-filter">
            <a href="/players/profile"><img class="w-100" src="{{asset('img/players/player1.jpg')}}" alt="Player3"></a>
            <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">Aaron Schiner</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mt-6 img-padding">
          <div class="blue-filter">
            <a href="/players/profile"><img class="w-100" src="{{asset('img/players/player1.jpg')}}" alt="Player4"></a>
            <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">Aaron Schiner</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mt-6 img-padding">
          <div class="blue-filter">
            <a href="/players/profile"><img class="w-100" src="{{asset('img/players/player1.jpg')}}" alt="Player5"></a>
            <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">Aaron Schiner</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mt-6 img-padding">
          <div class="blue-filter">
            <a href="/players/profile"><img class="w-100" src="{{asset('img/players/player1.jpg')}}" alt="Player6"></a>
            <div class="player-name w-100">
              <h4 class="fs-18 fw_b nanum white">Aaron Schiner</h4>
            </div>
          </div>
        </div> --}}


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




<paginate ref="paginator" name="places" :list="itineraries" :per="6" tag="div" class="row">
				<div class="col-md-6 col-xl-4" v-for="place in paginated('places')">
					<div class="soundscape-location-data-card mh" v-if="place.image != null" :style="{ backgroundImage: `url('${place.image}')` }">
						<div :class="place.overlay" class="soundscape-overlay"></div>
						<img class="sg-logo2" src="/img/location/sg-icon.png"  />
						<div class="row">
							<div class="col-3 col-md-4 col-xl-3 pr-0">
								<img class="soundscape-tribe-icon"  v-bind:src="`${place.featured_tribe_second_icon}`"  />
							</div>
							<div class="col-9 col-md-8 col-xl-9 align-self-center">
								<p class="soundscape-tribe" v-if="place.featured_tribe == 'CULTURE SHAPER'" v-html="cultureShaper">
									{{ cultureShaper }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'COLLECTOR'" v-html="collector">
									{{ collector }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'SOCIALISER'" v-html="socialiser">
									{{ socialiser }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'ACTION SEEKER'"  v-html="actionSeeker">
									{{ actionSeeker }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'FOODIE'" v-html="foodie">
									{{ foodie }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'EXPLORER'" v-html="explorer">
									{{ explorer }}
								</p>
							</div>
							<div class="col-12">
								<p class="soundscape-recom-by-who pt-3">{{ recomBy }}<br /> '{{place.featured_username}}':</p>
								<p class="soundscape-location hyphenate">{{place.featured_location}}</p>
							</div>
						</div>
					</div>
					<div class="soundscape-location-data-card mh" v-else-if="place.image == null" :style="{ backgroundImage: `url('${place.featured_tribe_bg_cover}')` }">
						<img class="sg-logo2" src="/img/location/sg-icon.png"  />
						<div class="row">
							<div class="col-3 col-md-4 col-xl-3 pr-0">
								<img class="soundscape-tribe-icon"  v-bind:src="`${place.featured_tribe_second_icon}`"  />
							</div>
							<div class="col-9 col-md-8 col-xl-9 align-self-center">
								<p class="soundscape-tribe" v-if="place.featured_tribe == 'CULTURE SHAPER'" v-html="cultureShaper">
									{{ cultureShaper }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'COLLECTOR'" v-html="collector">
									{{ collector }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'SOCIALISER'" v-html="socialiser">
									{{ socialiser }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'ACTION SEEKER'"  v-html="actionSeeker">
									{{ actionSeeker }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'FOODIE'" v-html="foodie">
									{{ foodie }}
								</p>
								<p class="soundscape-tribe" v-else-if="place.featured_tribe == 'EXPLORER'" v-html="explorer">
									{{ explorer }}
								</p>
							</div>
							<div class="col-12">
								<p class="soundscape-recom-by-who pt-3">{{ recomBy }}<br /> '{{place.featured_username}}':</p>
								<p class="soundscape-location hyphenate">{{place.featured_location}}</p>
							</div>
						</div>
					</div>
					<div class="soundscape-other-info-container">
						<p class="soundscape-location-desc">{{place.featured_desc}}</p>
						<div class="soundscape-border-btm sbb-1"></div>
						<p class="soundscape-time-spend">{{ time }}<br /><span class="fw-bold">{{place.featured_time}}</span></p>
						<div class="soundscape-border-btm sbb-2"></div>
						<iframe class="soundscape-song-preview" v-bind:src="place.track_id" frameborder="0" width="100%"></iframe>
						<div class="soundscape-border-btm sbb-3"></div>
						<p class="soundscape-recom-by">{{ alsoRecomBy }}<br /><span class="fw-bold text-uppercase">+{{place.count}} More People</span></p>
						<div class="soundscape-border-btm sbb-4"></div>
						<p class="soundscape-recom-by" v-if="place.photo_credit != null">{{ photoCredit }}:<br /><span class="fw-bold text-uppercase">{{ place.photo_credit }}</span></p>
						<div class="soundscape-border-btm sbb-4" v-if="place.photo_credit != null"></div>
						<div class="row">
							<div class="col-6 pr-0" @click="shareLocation">
								<social-sharing :url="place.url" :title="place.title" inline-template v-if="currentCountry == 'ID'">
									<div class="h-100">
										<network network = "facebook">
											<button class="soundscape-share-btn" type="button" name="button">
												<span class="soundscape-share-btn-text">Bagikan di</span>
												<i class="fa fa-facebook-official fb-icon pl-2" aria-hidden="true"></i>
											</button>
										</network>
									</div>
								</social-sharing>
								<social-sharing :url="place.url" :title="place.title" inline-template v-if="currentCountry != 'ID'">
									<div class="h-100">
										<network network = "facebook">
											<button class="soundscape-share-btn" type="button" name="button">
												<span class="soundscape-share-btn-text">Share on</span>
												<i class="fa fa-facebook-official fb-icon pl-2" aria-hidden="true"></i>
											</button>
										</network>
									</div>
								</social-sharing>
							</div>
							<div class="col-6 pr-0" @click="setItineraryId(place.id)">
								<button data-toggle="modal" data-target="#flagThisLocationModal" class="soundscape-share-btn"type="button" name="button">
									<i class="fa fa-flag" aria-hidden="true"></i><span class="soundscape-flag-text" v-html="flagText">{{ flagText }}</span>
								</button>
								<!-- flag button modal -->
								<div class="modal fade" id="flagThisLocationModal" tabindex="-1" role="dialog" aria-labelledby="flagThisLocationModalTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title color-black" id="flagThisLocationModalTitle">{{ flagModal }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-12">
														<form @submit.prevent="flagLocation" accept-charset="UTF-8" id="flagForm">
															<label class="color-black mb-3">{{ reasonInput }}:</label><br>
															<input type="hidden" name="itinerary_id" :value="place.id">
															<input type ="text" name="reason" class="form-control" style="width:100%" v-model="reason">
														</form>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" @click="flagLocation">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</paginate>