@extends('admin.layouts.secondary')

@section('meta-content')
  <title>Login | Merchant Portal</title>
@endsection

@section('code', '404')

@section('content')
  <h1 class="fs-30 lp-25 text-center">Sign In</h1>

  <form method="post" action="{{ route('login') }}">
    @csrf
    <p class="tnc pt-0 text-center">Merchant Portal</p>
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

      <p class="tnc pt-0 text-center mt-4">
        No Account? <br>
        <a href="{{ route('register.show') }}">
          REGISTER
        </a>
      </p>
    </div>
  </form>
@endsection
