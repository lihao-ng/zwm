@extends('admin.layouts.master')

@section('meta-content')
  <title>Create League | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')

  <form class="" action="{{ route('admin.leagues.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col">
        <div class="card p-3">
          <div class="card-body">

            <div class="row align-items-end mb-3">
              <div class="col">
                <h3>Create League</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-10 mb-3">
                <input name="name" maxlength="250" type="text" placeholder="Name" class="form-control" value="{{ old('name') }}">
              </div>

              <div class="col">
                <button type="submit" value="Submit" class="btn btn-primary">Create</button>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
</form>

@endsection

@push('scripts')
  <script type="text/javascript">

    $( document ).ready(function() {

    });


  </script>
@endpush
