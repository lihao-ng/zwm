@extends('client.layouts.master')

@section('meta-content')
  <title>About Us | {{ config('app.name') }}</title>
@endsection

@section('content')
<section id="about-us-intro">
  <div class="about-us-img">
    <div class="container">
        <h1 class="title-slide-in white ecd banner-title fw-bold">ABOUT US</h1>
        <p class="text-slide-in white ecd fs-24 mt-3">Get to know the people behind
          the scenes.</p>
    </div>
  </div>

  <div class="container">
    <div class="intro-container">
      <h3 class="blue fs-30 ecd mb-2">Asare sports invision is to bring young and talented athletes and beyond their potential.</h3>
      <hr align="left" width="8%">
      <div class="row">
        <div class="col-lg-4">
          <p class="red mt-2 lh-2">Lorem ipsum dolor sit amet,
          consectetuer adipiscing elit, sed
          diam nonummy nibh euismod consectetuer </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="individual-intro">
  <div class="bg-blue ind-intro-container">
    <div class="container">
      <div class="row">

        @foreach ($directors as $director)
          <div class="col-lg-4 col-md-4 col-sm-6 text-center mt-5">

            @if($director->avatar)
              <div class="ind-img">
                <img class="ind-img-1 w-100" src="{{asset('/storage/images/upload')."/".$director->avatar}}" alt="Staff4">
                {{-- <img class="ind-img-2" src="{{asset('/storage/images/upload')."/".$director->avatar}}" alt="Staff4"> --}}
              </div>
            @else
              <div class="ind-img">
                <img class="ind-img-1 w-100" src="{{asset('images/no_image.jpg')}}" alt="Staff4">
              </div>
            @endif
            
            <h4 class="white ecd fs-24 mt-3">{{$director->first_name}} {{$director->last_name}}</h4>
            <hr align="center" width="20%">
            <p class="white ecd lp-16">
              {{$director->description}}
            </p>
          </div>
        @endforeach
        
        
        {{-- 
        <div class="col-lg-4 col-md-4 col-6 text-center mt-5">
          <div class="ind-img">
            <img class="ind-img-1 w-100" src="{{asset('img/about_us/individual_1.jpg')}}" alt="Staff5">
            <img class="ind-img-2" src="{{asset('img/about_us/individual_1_bw.jpg')}}" alt="Staff5">
          </div>
          <h4 class="white ecd fs-24 mt-3">MICHEAL KORZX</h4>
          <hr align="center" width="20%">
          <p class="white ecd fs-20 lp-16">Lorem ipsum dolor sit amet,
            consectetuer adipiscing elit, sed
            diam nonummy nibh euismod consectetuer </p>
        </div>
        --}}
      </div>
    </div>
  </div>
</section>

<div class="blank-container">
</div>
@endsection
