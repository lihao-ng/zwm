@extends('client.layouts.master')

@section('meta-content')
  <title>Offers</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar d-flex mb-3">
        <a href="{{ route('offers.create') }}" class="ml-auto btn btn-primary">
          Create
        </a>
      </div>
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table" data-url="{{ route('offers.index') }}">
          <thead>
            <th data-field="id" class="text-center align-middle" data-sortable="true">ID</th>
            <th data-field="name" class="align-middle" data-sortable="true">Name</th>
            <th data-field="points" class="align-middle">Points Per Item</th>
            <th data-field="description" class="align-middle">Description</th>
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
