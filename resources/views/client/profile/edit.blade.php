@extends('client.layouts.master')
@section('meta-content')
  <title>Profile</title>
@endsection

@section('content')
  {!! Form::model($merchant, ['route' => ['profile.update', $merchant->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}  
    <div class="card p-3 mb-3">
      <div class="profile-wrapper">
        <h1 class="lp-25 text-center mb-3">Profile</h1>
        
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Category</p>
              {{ Form::select('category', [
                  "Bulk Food" => "Bulk Food", 
                  "Bookworm&#039;s Paradise" => "Bookworm&#039;s Paradise",
                  "Community Compost Sites" => "Community Compost Sites",
                  "Furry Friend&#039;s Corner (Pet food and supplies)" => "Furry Friend&#039;s Corner (Pet food and supplies)",
                  "Household Cleaning Product" => "Household Cleaning Product",
                  "Repair Services" => "Repair Services",
                  "Thrift Shop (Second-hand Shop)" => "Thrift Shop (Second-hand Shop)",
                  "Upcycling, Recycling &amp; Waste Disposal" => "Upcycling, Recycling &amp; Waste Disposal",
                  "Traditional &amp; Wet Market" => "Traditional &amp; Wet Market",
                  ], null, ['class' => 'form-control', 'required' => 'true']) }}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Name of vendor/shop</p>
              {{ Form::text('name', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
            </div>

            <div class="col-12 mb-3">
              <p class="tnc p-0 m-1">Vendors/ shop description</p>
              {!! Form::textarea('description', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Address</p>
              {{ Form::text('address', null, ['id' => 'autocomplete', 'class' => 'form-control', 'required' => 'true', 'autocomplete' => 'new-password']) }}

              {{ Form::hidden('lat') }}
              {{ Form::hidden('lng') }}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Business hours</p>
              {{ Form::text('business_hours', null, ['class' => 'form-control', 'required' => 'true']) }}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Contact no (of shop/owner)</p>
              {{ Form::text('contact', null, ['class' => 'form-control', 'required' => 'true']) }}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Links (website, facebook and etc)</p>
              {{ Form::text('link', null, ['class' => 'form-control', 'required' => 'true']) }}
            </div>

            <div class="col-12 mb-3">
              <p class="tnc p-0 m-1">Other information/feedback</p>
              {!! Form::textarea('other_information', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Related photos (If any)</p>
              <input name="photo" type="file" placeholder="Upload photo" class="form-control">
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Your email address</p>
              {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'true', 'disabled' => true]) }}
            </div>

            <div class="col ml-auto text-right">
              <button type="submit" value="Submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="generic-bg">
    <div class="profile-wrapper">
      <h1 class="lp-25 text-center mb-3">Password</h1>

      <div class="row student-profile">
        <div class="col-12">
          <form method="post" action="{{ route('profile.password') }}">
            @csrf
            @method('put')
            <h2 class="subtitle">Change Password</h2>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="current_password_label" class="text-grey-darkest uppercase">Current Password <span class="required">*</span></label>
                  <input name="current_password" type="password" class="form-round" id="current_password_label" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="new_password_label" class="text-grey-darkest uppercase">New Password <span class="required">*</span></label>
                  <input name="password" type="password" class="form-round" id="new_password_label" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="confirm_new_password_label" class="text-grey-darkest uppercase">Confirm New Password <span class="required">*</span></label>
                  <input name="password_confirmation" type="password" class="form-round" id="confirm_new_password_label" required>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-group">
                  <p class="copy"><span class="required">*</span> Required fields</p>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end mt-5 mt-sm-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
