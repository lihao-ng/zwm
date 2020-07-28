@extends('admin.layouts.master')

@section('meta-content')
  <title>Users</title>
@endsection

@section('content')
  <div class="card bootstrap-table">
    <div class="card-body table-full-width">
      <div class="toolbar d-flex mb-3">
      </div>
      <div class="table-responsive-sm custom-table">
        <table id="bootstrap-table" class="table" data-url="{{ route('admin.users.index') }}">
          <thead>
            <th data-field="id" class="text-center align-middle" data-sortable="true">ID</th>
            <th data-field="name" class="align-middle" data-sortable="true">Name</th>
            <th data-field="code" class="align-middle" data-sortable="true">Code</th>
            <th data-field="email" class="align-middle">Email</th>
            <th data-field="total_points" class="align-middle">Total Points</th>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection