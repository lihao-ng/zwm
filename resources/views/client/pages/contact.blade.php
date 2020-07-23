@extends('client.layouts.master')

@section('meta-content')
  <title>Contact | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="contact container text-center mt-5">
  <h1 class="contact-text ecd twin-headings big red">
    CONTACT
  </h1>
  <div class="text-center pb-5">
    <img class="bullseye" src="img/homepage/bullseye.png" alt="Borderline">
  </div>

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.889182430429!2d101.67201421426289!3d3.1239972541791543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc494c90cba521%3A0xa80bfc65519c5afa!2sThe%20Techy%20Hub%20%7C%20Web%20%26%20App%20Development%20Agency%20in%20Malaysia!5e0!3m2!1sen!2smy!4v1582682275851!5m2!1sen!2smy" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

  <div class="row contact-row pt-5 pb-5">
    
    <div class="col-lg-7 business-address">
      <div class="d-flex">
        <h3 class="ecd fs-20 font-weight-bold">
          Address
        </h3>
      </div>
      <p class="nanum fs-20 blue text-left">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
    </div>

    <div class="col-lg-3 business-enquiries">
      <div class="d-flex">
        <h3 class="ecd fs-20 font-weight-bold blue">Business Enquiry
        </h3>
      </div>
    <div>
      <a class="nanum fs-24 font-weight-bold office-number" href="tel:+60-115-5559">
        (+60) 115 5559
      </a>
      <a class="ecd fs-20 email" href="mailto:contact@asaresports.com">
        contact@asaresports.com
      </a>
    </div>
    </div>
  </div>
</div>
@endsection