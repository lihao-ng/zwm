@extends('client.layouts.master')

@section('meta-content')
  <title>Home | {{ config('app.name') }}</title>
@endsection

@section('content')
  <section id="homepage-background">
    <div class="container">
      <div class="tagline row">
        <div class=" background-text col-md-5">
          <h1 class="banner-title ecd white">YOUR DREAM,<br>OUR VISION</h1>
          <p class="ecd fs-24 white">
            Asare sports invision is to bring young and talented athletes and beyond their potential.
          </p>
        </div>
      </div>
    </div>

    <div class="background-players">
      <img src="img/homepage/background-players.png" alt="Heading Players">
    </div>
  </section>

  <section id="WHY_US" class="home-section-spacing bottom-spacing">
    <div class="container text-center">
      <h2 class="twin-headings small font-weight-bold">
        WHY
      </h2>
      <h1 class="ecd twin-headings big red">
        US
      </h1>
      <div class="text-center">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>

      <div class="why_us-text mt-5">
        <p class="mb-0">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
          <br><br>
          exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto</p>

          {{-- <div class="container pl-0">
            <a class="button1 grey red ecd fs-20 font-weight-bold" :href="`/players/${player.id}`">SEE MORE</a> // A
            <a class="button1 border-box ecd fs-20 font-weight-bold" href="/about-us">SEE MORE</a>  // B
          </div> --}}
          <a class="button1 grey red ecd fs-20 font-weight-bold" href="/about-us">SEE MORE</a>
      </div>
  
      <div class="social-medias text-center">
        <div class="icons d-flex">
          <a class="circle" href="https://www.facebook.com/" target="_blank">
            <img class="media-icon" src="img/homepage/facebook.png" alt="Facebook">
          </a>
        
          <a class="circle insta-circle" href="https://www.instagram.com/" target="_blank">
            <img class="media-icon" src="img/homepage/instagram.png" alt="Instagram">
          </a>

          <a class="circle" href="https://www.youtube.com/" target="_blank">
            <img class="media-icon" src="img/homepage/youtube.png" alt="Youtube">
          </a>
        </div>
      </div> 
    </div>    
  </section>

  <section id="our_services" class="home-section-spacing bottom-spacing">
    <div class="container text-center">
      <h2 class="twin-headings small font-weight-bold">
        OUR
      </h2>
      <h1 class="ecd twin-headings big red">
        SERVICES
      </h1>
      <div class="text-center">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>

      <div class="service-row">
        <div class="row mt-3 justify-content-between">
          <div class="representation col-md-5 mb-4">
            <img src="img/homepage/representation.png" alt="Representation">
            <h3 class="red font-weight-bold">
              REPRESENTATION
            </h3>
            <p class="">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
            </p>
          </div>
          <div class="scouting col-md-5 mb-4">
            <img src="img/homepage/scouting.png" alt="Scouting">
            <h3 class="red font-weight-bold">
              SCOUTING
            </h3>
            <p class="">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
            </p>
          </div>
        </div>
      </div>
      <div class="service-row">
        <div class="row justify-content-between">
          <div class="sport-marketing col-md-5 mb-4">
            <img src="img/homepage/sport-marketing.png" alt="Sport Marketing">
            <h3 class="red font-weight-bold">
              SPORT MARKETING
            </h3>
            <p class="">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
            </p>
          </div>
          <div class="legal col-md-5 mb-4">
            <img src="img/homepage/legal.png" alt="Legal">
            <h3 class="red font-weight-bold">
              LEGAL
            </h3>
            <p class="">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="featured_players" class="home-section-spacing">

    <div class="container text-center">
      <h2 class="twin-headings small font-weight-bold">
        FEATURED
      </h2>
      <h1 class="ecd twin-headings big red">
        PLAYERS
      </h1>
      <div class="text-center">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>
    </div>

    <featured-players-component
      :regions="{{$regions}}"
      :leagues="{{$leagues}}"
    >
    </featured-players-component>

    <div class="container text-center">
      <a class="button1 grey ecd fs-20 font-weight-bold" href="{{route('players.index')}}">SEE MORE</a>
    </div>
  </section>

  <section class="pb-3 home-section-spacing" id="latest_teams">

    <div class="container text-center">
      <h2 class="twin-headings small font-weight-bold">
        LATEST
      </h2>
      <h1 class="ecd twin-headings big red">
        TEAMS
      </h1>
      <div class="text-center">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>
    </div>
    

    <latest-teams-component
      :regions="{{$regions}}"
      :leagues="{{$leagues}}"
    >
    </latest-teams-component>
    

    <div class="container text-center">
      <a class="button1 white ecd fs-20 font-weight-bold" href="{{route('teams.index')}}">SEE MORE</a>
    </div>

  </section>

  <section id="review" class="home-section-spacing">
    <home-players-component></home-players-component>
  </section>

  {{-- <section id="instagram-feed">

    <div class="container text-center">
      <h1 class="ecd twin-headings big red mt-3 pt-5">
        INSTAGRAM
      </h1>
      <div class="text-center pb-4">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>
    </div>

    <div class="insta-slider">
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile1.jpg') }}" alt="Profile1">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile2.jpg') }}" alt="Profile2">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile3.jpg') }}" alt="Profile3">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile4.jpg') }}" alt="Profile4">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile5.jpg') }}" alt="Profile5">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile5.jpg') }}" alt="Profile6">
      </div>
      <div class="insta-profile lightorange-filter">
        <img src="{{ asset('img/homepage/profile5.jpg') }}" alt="Profile7">
      </div>
    </div>
  </section> --}}

  <section id="contact" class="home-section-spacing bottom-spacing">
    <div class="container text-center mt-5">
      <h1 class="contact-text ecd twin-headings big red">
        CONTACT
      </h1>
      <div class="text-center pb-5">
        <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
      </div>


      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.889182430429!2d101.67201421426289!3d3.1239972541791543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc494c90cba521%3A0xa80bfc65519c5afa!2sThe%20Techy%20Hub%20%7C%20Web%20%26%20App%20Development%20Agency%20in%20Malaysia!5e0!3m2!1sen!2smy!4v1582682275851!5m2!1sen!2smy" 
        {{-- width="800"
        height="600" --}}
        frameborder="0" 
        style="border:0;" 
        allowfullscreen=""
        >
      </iframe>


      <div class="row contact-row pt-5">
        <div class="col-lg-7 business-address">
          <div class="d-flex">
            <p class="contact-head">
              Address
            </p>
          </div>
          <p class="blue text-left">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
        </div>


        <div class="col-lg-3 business-enquiries">
          <div class="d-flex">
            <p class="contact-head blue">
              Business Enquiry
            </p>
          </div>
          <div>
            <a class="font-weight-bold office-number" href="tel:+60-115-5559">
              (+60) 115 5559
            </a>
            <a class="email" href="mailto:contact@asaresports.com">
              contact@asaresports.com
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
