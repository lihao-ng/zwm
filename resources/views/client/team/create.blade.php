@extends('admin.layouts.master')

@section('meta-content')
  <title>Create Team | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')


  <div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">

          <div class="row">
            <div class="col-sm-12 mb-3">
              <h3>Create Team</h3>
            </div>
          </div>

        <admin-team-form
          v-bind:is-edit="false"
          v-bind:regions="{{$regions}}"
          :leagues="{{$leagues}}"
          :owner-type="'{{$ownerType}}'"
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
