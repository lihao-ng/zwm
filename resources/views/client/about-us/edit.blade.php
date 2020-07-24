@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Director | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')
<div class="row">
  <div class="col">
    <div class="card p-3">
      <div class="card-body">

        <div class="row">
          <div class="col-sm-10 mb-3">
            <h3>Edit Director</h3>
          </div>
          <div class="col-sm-2">
            @if($director->avatar == null)
              <img class="w-100" src="{{ asset('images/no_image.jpg')}}" alt="team-image">
            @else
              <img class="w-100" src="{{ asset('storage/images/upload') . '/'. $director->avatar}}" alt="team-image">
            @endif
          </div>
        </div>

        <director-form-component
          :director="{{$director}}"
          :is-edit="true"
        >
        </director-form-component>


      </div>
    </div>
  </div>
</div>
@endsection