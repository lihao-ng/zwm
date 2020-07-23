@extends('admin.layouts.master')

@section('meta-content')
  <title>Create Director | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')
<div class="row">
  <div class="col">
    <div class="card p-3">
      <div class="card-body">

        <div class="row">
          <div class="col-sm-12 mb-3">
            <h3>Create Director</h3>
          </div>
        </div>

        <director-form-component></director-form-component>


      </div>
    </div>
  </div>
</div>
@endsection