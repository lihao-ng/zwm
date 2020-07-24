@extends('admin.layouts.secondary')

@section('meta-content')
  <title>Login | Admin Portal</title>
@endsection

@section('code', '404')

@section('content')
  <h1 class="fs-30 lp-25 text-center">Sign In</h1>

  <form method="post" action="{{ route('admin.login.post') }}">
    @csrf
    <p class="tnc pt-0 text-center">Admin Portal</p>
    <div class="auth-inputs">
      <div class="auth-input-wrapper">
        <input name="email" type="email" id="email_label" placeholder="Email Address...">
      </div>

      <div class="auth-input-wrapper">
        <input name="password" type="password" id="password_label" placeholder="Password...">
      </div>

      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">LOGIN</button>
      </div>
    </div>
  </form>
@endsection
