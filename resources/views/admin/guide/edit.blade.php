@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Guide</title>
@endsection

@section('content')
  <guides-component guide-prop="{{ json_encode($guide) }}"></guides-component>
@endsection