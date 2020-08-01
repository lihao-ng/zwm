@extends('client.layouts.master')

@section('meta-content')
  <title>Generate Promo Code</title>
@endsection

@section('content')
{!! Form::open(['route' => ['promo-codes.generate'], 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
  <div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Generate Promo Code</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Coupon Name</label>
                {{ Form::select('coupon_id', $offers, null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <!-- Use vue for the select to show the prefix -->

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Quantity/How many coupons</label>
                {!! Form::text('quantity', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) !!}
              </div>
            </div>
            
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