@extends('admin.layouts.master')

@section('meta-content')
  <title>Leagues | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar d-flex mb-3">
        <a href="{{ route('admin.leagues.create') }}" class="ml-auto btn btn-primary">
          Create
        </a>
        {{-- <a href="{{ route('admin.promotion-codes.export') }}" class="ml-2 btn btn-primary">
          Export
        </a> --}}
      </div>
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table"
          data-browser-url="{{-- route('admin.promotion-codes.index') --}}"
          data-api-url="{{-- route('admin.api.promotion-codes.index') --}}"
          data-url="{{ route('admin.leagues.index') }}"
          >
          <thead>
            <th data-field="id" class="text-center align-middle" data-sortable="true">ID</th>
            <th data-field="name" class="align-middle">Name</th>
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

    function operateFormatter(value, row, index) {
      return [
        // `<a rel="tooltip" title="View" class="btn" href="javascript:void(0)">`,
        // '<i class="fal fa-info view"></i>',
        // '</a>',
        `<a rel="tooltip" title="Edit" class="btn" href="javascript:void(0)">`,
        '<i class="fal fa-edit edit"></i>',
        '</a>',
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
