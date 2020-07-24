@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit League | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')

  <form class="" action="{{ route('admin.leagues.update', [$league->id]) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col">
        <div class="card p-3">
          <div class="card-body">

            <div class="row align-items-end mb-3">
              <div class="col">
                <h3>Edit League</h3>
              </div>
            </div>

            <div class="row">
              {{-- <div class="col-sm-2">
                <div class="form-group has-label">
                  <label>ID</label>
                  <input name="id" type="text" placeholder="ID" class="form-control" value="{{ $league->id }}" disabled>
                </div>
              </div> --}}

              <div class="col">
                <div class="form-group has-label">
                  <label>Name </label>
                <input name="name" maxlength="250" type="text" placeholder="Name" class="form-control" value="{{ $league->name }}">
                </div>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col">
                <button type="submit" value="Submit" class="btn btn-primary">Save</button>
                {{-- <button class="btn btn-primary">Save</button> --}}
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
