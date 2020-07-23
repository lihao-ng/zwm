@extends('admin.layouts.master')

@section('meta-content')
  <title>Create Statistic | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')

  <div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">

          
        <player-team-statistic-form 
          v-bind:owner-type="'{{$owner_type}}'" 
          :current-owner="{{$owner}}"
          @if ($statistic)
            :current-statistic="{{$statistic}}"
          @endif
          >
        </player-team-statistic-form>
          


          {{-- <admin-player-form v-bind:is-edit="false" v-bind:regions="{{ $regions }}" v-bind:leagues="{{$leagues}}" v-bind:teams="{{$teams}}"></admin-player-form> --}}
          

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
