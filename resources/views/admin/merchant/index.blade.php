@extends('admin.layouts.master')

@section('meta-content')
  <title>Merchants</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar d-flex mb-3 flex-row-reverse">
        {{-- <a href="{{ route('admin.merchants.create') }}" class="ml-auto btn btn-primary">
          Create
        </a> --}}

        {!! Form::open(['route' => 'admin.merchants.import', 'enctype' => 'multipart/form-data', 'class' => 'd-inline-block import_form',
              'id' => 'form']) !!}
              <label for="file">
                <span class="ml-auto btn btn-primary" >
                  Import
                </span>
                <input type="file" id="file" class="on_file_import" name="file" style="display:none" data-target=".import_form">
              </label>
            {!! Form::close() !!} 
      </div>
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table" data-url="{{ route('admin.merchants.index') }}">
          <thead>
            <th data-field="id" class="text-center align-middle" data-sortable="true">ID</th>
            <th data-field="name" class="align-middle" data-sortable="true">Name</th>
            <th data-field="category" class="align-middle">Category</th>
            <th data-field="address" class="align-middle">Address</th>
            <th data-field="approved" class="align-middle" data-sortable="true">Approved</th>
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
