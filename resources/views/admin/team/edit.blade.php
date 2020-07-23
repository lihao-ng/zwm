@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Team | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')


  <div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">

          <div class="row align-items-end mb-3">
            <div class="col-sm-10">
              <h3>Edit Team</h3>
            </div>
            <div class="col-sm-2">
              @if($team->cover_image == null)
                <img class="w-100" src="{{ asset('images/no_image.jpg')}}" alt="team-image">
              @else
                <img class="w-100" src="{{ asset('storage/images/upload') . '/'. $team->cover_image}}" alt="team-image">
              @endif
            </div>
          </div>

          <admin-team-form
            v-bind:is-edit="true"
            v-bind:regions="{{$regions}}"
            :leagues="{{$leagues}}"
            :current-team="{{$team}}"
            :owner-type="'{{$ownerType}}'"
            @if($team->statistic)
              :statistic="{{$team->statistic}}"
            @endif
            >
          </admin-team-form>

        </div>
      </div>

    </div>
  </div>

@endsection

@push('scripts')
  <script type="text/javascript">

    $( document ).ready(function() {

    });


  </script>
@endpush
