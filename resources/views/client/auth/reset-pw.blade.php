@extends('client.layouts.master')

@section('content')
<resetpassword-component prop-verification="{{ $verification }}"></resetpassword-component>
@endsection