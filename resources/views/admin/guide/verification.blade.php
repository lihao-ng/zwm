@extends('admin.layouts.master')

@section('meta-content')
  <title>Players | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      {{-- <div class="toolbar d-flex mb-3">
        <a href="{{ route('admin.players.create') }}" class="ml-auto btn btn-primary">
          Create - X
        </a>
        <a href="{{ route('admin.promotion-codes.export') }}" class="ml-2 btn btn-primary">
          Export
        </a>
      </div> --}}
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table"
          data-browser-url="{{-- route('admin.promotion-codes.index') --}}"
          data-api-url="{{-- route('admin.api.promotion-codes.index') --}}"
          data-url="{{ route('admin.players.verification') }}"
          >
          <thead>
            {{-- <th data-field="number" class="text-center align-middle" data-formatter="numberFormatter">No.</th> --}}
            <th data-field="name" class="align-middle">Name</th>
            <th data-field="email" class="align-middle">Email</th>
            <th data-field="team" class="align-middle">Team</th>
            <th data-field="position" class="align-middle">Position</th>
            <th data-field="actions" class="td-actions text-center align-middle" data-events="operateEvents" data-formatter="operateFormatter">
              Actions
            </th>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">

    function numberFormatter(value, row, index) {
      // console.log("value::"+value);
      // console.log("row::"+JSON.stringify(row));
      // console.log("index::"+index);
      return index++;
    }

    // function avatarFormatter(value, row, index){

    //   var img = `${row.avatar}`, no_img = 'no_image.jpg';

    //   if(!(img == no_img) ){
    //     return [
    //       `
    //       <div class="w-100">
    //         <img class="w-100" src="{{asset('storage/images/upload/').'/'}}${row.avatar}" alt="player-img">
    //       </div>
    //       `
    //     ].join('');
    //   }
    //   else{
    //     return [
    //       `
    //       <div class="w-100">
    //         <img class="w-100" src="{{asset('/images/no_image.jpg')}}" alt="player-img">
    //       </div>
    //       `
    //     ].join('');
    //   }
    // }

    function operateFormatter(value, row, index) {
      return [
        `<a rel="tooltip" title="Verify" class="btn" href="javascript:void(0)">`,
        '<i class="fal fa-check player-verify"></i>',
        '</a>',
        // `<a rel="tooltip" title="Edit" class="btn" href="javascript:void(0)">`,
        // '<i class="fal fa-edit edit"></i>',
        // '</a>',
        '<a rel="tooltip" title="Remove" class="btn" href="javascript:void(0)">',
        '<i class="fal fa-times remove"></i>',
        '</a>',
      ].join('');
    }
  </script>
@endpush

@push('styles')
  <style media="screen">
    
  </style>
@endpush
