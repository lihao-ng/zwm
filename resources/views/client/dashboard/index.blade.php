@extends('admin.layouts.master')

@section('meta-content')
  <title>Dashboard | {{ config('app.name') }} Admin Portal</title>
@endsection

@section('content')
  <dashboard-component></dashboard-component>
@endsection
