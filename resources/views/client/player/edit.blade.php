@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Player | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')

  {{-- <form class="" action="{{ route('admin.players.update', [$player->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf --}}

    <div class="row">
      <div class="col">
        <div class="card p-3">
          <div class="card-body">

            <div class="row align-items-end mb-3">
              <div class="col-sm-10 d-flex align-items-end">
                <h3 class="mb-0">Edit Player</h3>
              </div>
              <div class="col-sm-2">
                @if($player->avatar == null)
                  <img class="w-100" src="{{ asset('images/no_image.jpg')}}" alt="team-image">
                @else
                  <img class="w-100" src="{{ asset('storage/images/upload') . '/'. $player->avatar}}" alt="team-image">
                @endif
              </div>
            </div>

            <admin-player-form 
              v-bind:is-edit="true" 
              :player="{{$player}}" 
              :regions="{{ $regions }}"
              :leagues="{{$leagues}}" 
              :teams="{{$teams}}"
              :owner-type="'{{$ownerType}}'"
              @if($player->statistic)
                :statistic="{{$player->statistic}}"
              @endif
              @if($player->teams)
                :current-player-teams="{{$player->teams}}"
              @endif
              >
            </admin-player-form>
            
          </div>
        </div>

      </div>
    </div>
{{-- </form> --}}

@endsection

@push('scripts')
  <script type="text/javascript">

    $( document ).ready(function() {

    });


  </script>
@endpush
