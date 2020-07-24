@extends('client.layouts.tertiary')

@section('meta-content')
  <title>Register | Merchant Portal</title>
@endsection

@section('code', '404')

@section('content')
  <h1 class="fs-30 lp-25 text-center">Register</h1>

  <form method="post" action="{{ route('register') }}">
    @csrf

    <div class="card p-3">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Category</p>
            <select name="category" class="form-control" required>
              <option value='Bulk Food'>Bulk Food</option>
              <option value='Bookworm&#039;s Paradise'>Bookworm&#039;s Paradise</option>
              <option value='Community Compost Sites'>Community Compost Sites</option>
              <option value='Furry Friend&#039;s Corner (Pet food and supplies)'>Furry Friend&#039;s Corner (Pet food and supplies)</option>
              <option value='Household Cleaning Product'>Household Cleaning Product</option>
              <option value='Personal Care Product'>Personal Care Product</option>
              <option value='Repair Services'>Repair Services</option>
              <option value='Thrift Shop (Second-hand Shop)'>Thrift Shop (Second-hand Shop)</option>
              <option value='Upcycling, Recycling &amp; Waste Disposal'>Upcycling, Recycling &amp; Waste Disposal</option>
              <option value='Traditional &amp; Wet Market'>Traditional &amp; Wet Market</option>
            </select>
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Name of vendor/shop</p>
            <input name="name" maxlength="250" type="text" placeholder="Name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="col-12 mb-3">
            <p class="tnc p-0 m-1">Vendors/ shop description</p>
            <textarea name="description" maxlength="300" type="text" placeholder="Description" class="form-control" required>{{ old('description') }}</textarea>
          </div>

          <!-- change to vue later with autocomplete -->
          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Address</p>
            <input name="address" maxlength="250" type="text" placeholder="Address" class="form-control" value="{{ old('address') }}">
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Business hours</p>
            <input name="hours" maxlength="250" type="text" placeholder="Business Hours" class="form-control" value="{{ old('hours') }}">
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Contact no (of shop/owner)</p>
            <input name="contact" maxlength="250" type="text" placeholder="Contact No" class="form-control" value="{{ old('contact') }}">
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Links (website, facebook and etc)</p>
            <input name="link" maxlength="250" type="text" placeholder="Links" class="form-control" value="{{ old('link') }}">
          </div>

          <div class="col-12 mb-3">
            <p class="tnc p-0 m-1">Other information/feedback</p>
            <textarea name="feedback" maxlength="300" type="text" placeholder="Other information/feedback" class="form-control" required>{{ old('feedback') }}</textarea>
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Related photos (If any)</p>
            <input name="photo" type="file" placeholder="Upload photo" class="form-control">
          </div>

          <div class="col-12 col-md-6 mb-3">
            <p class="tnc p-0 m-1">Your email address</p>
            <input name="email" maxlength="250" type="text" placeholder="Email address" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="col ml-auto text-right">
            <button type="submit" value="Submit" class="btn btn-primary">REGISTER</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
