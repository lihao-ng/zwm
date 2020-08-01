@extends('client.layouts.master')

@section('meta-content')
  <title>Promo Codes</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar d-flex mb-3">
        <a href="{{ route('promo-codes.generate.show') }}" class="ml-auto btn btn-primary">
          Generate new codes
        </a>
      </div>
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table" data-url="{{ route('promo-codes.index') }}">
          <thead>
            <th data-field="id" class="text-center align-middle" data-sortable="true">ID</th>
            <th data-field="coupon_name" class="align-middle" data-sortable="true">Coupon Name</th>
            <th data-field="code" class="align-middle">Code</th>
            <th data-field="redeemed" class="align-middle">Redeemed</th>
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
        '<a rel="tooltip" title="Remove" class="btn" href="javascript:void(0)">',
        '<i class="fal fa-times remove"></i>',
        '</a>',
      ].join('');
    }
  </script>
@endpush
