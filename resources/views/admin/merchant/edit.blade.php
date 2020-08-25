@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Merchant</title>
@endsection

@section('content')
{!! Form::model($merchant, ['route' => ['admin.merchants.update', $merchant->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
  <div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Edit Merchant</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Category</label>
                {{ Form::select('category', [
                  "Bulk Food" => "Bulk Food", 
                  "Bookworm's Paradise" => "Bookworm's Paradise", 
                  "Community Compost Sites" => "Community Compost Sites", 
                  "Furry Friend's Corner (Pet food and supplies)" => "Furry Friend's Corner (Pet food and supplies)", 
                  "Household Cleaning Product" => "Household Cleaning Product", 
                  "Personal Care Product" => "Personal Care Product", 
                  "Repair Services" => "Repair Services", 
                  "Thrift Shop (Second-hand Shop)" => "Thrift Shop (Second-hand Shop)", 
                  "Upcycling, Recycling &amp; Waste Disposal" => "Upcycling, Recycling &amp; Waste Disposal", 
                  "Traditional &amp; Wet Market" => "Traditional &amp; Wet Market" 
                  ], null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Name of vendor/shop</label>
                {{ Form::text('name', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Vendors/ shop description</label>
                {!! Form::textarea('description', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
              </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <p class="tnc p-0 m-1">Address</p>
              {{ Form::text('address', null, ['id' => 'autocomplete', 'class' => 'form-control', 'required' => 'true']) }}

              {{ Form::hidden('lat', null,['id' => 'lat']) }}
              {{ Form::hidden('lng', null,['id' => 'lng']) }}
            </div>

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Business hours</label>
                {{ Form::text('business_hours', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>
            
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Contact no (of shop/owner)</label>
                {{ Form::text('contact', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>    
            </div>
            
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Links (website, facebook and etc)</label> 
                {{ Form::text('link', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Other information/feedback</label>
                {!! Form::textarea('other_information', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
              </div>
            </div>
            
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Related photos (If any)</label>
                <input name="photo" type="file" placeholder="Upload photo" class="form-control">
              </div>
            </div>
            
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Email address</label>
                {{ Form::text('email', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>
            
            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Approved</label>
                {{ Form::select('approved', ['Approved' => 'Approved', 'Not Approved' => 'Not Approved'], null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>
          </div>
          
          <div class="row pt-3">
            <div class="col text-right">
              <button type="submit" value="Submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection