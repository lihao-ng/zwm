@extends('admin.layouts.master')
@section('meta-content')
  <title>Profile | @app_name Admin Portal</title>
@endsection
@php
	$first_name = current_admin()->first_name;
	$last_name = current_admin()->last_name;
	$email = current_admin()->email;
@endphp

@section('content')
	<div class="generic-bg">
		<div class="profile-wrapper">
			<h1 class="lp-25 text-center">Profile</h1>
			<div class="row student-profile">
				<div class="col-lg-6 mb-5 mb-lg-0">
					<form method="post" action="{{ route('admin.profile.update') }}" method="post">
						@csrf
						<h2 class="subtitle">Personal Details</h2>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="first_name_label" class="text-grey-darkest uppercase">First Name <span class="required">*</span></label>
									<input name="first_name" type="text" id="first_name_label" value="{{ $first_name }}" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="last_name_label" class="text-grey-darkest uppercase">Last Name <span class="required">*</span></label>
									<input name="last_name" type="text" id="last_name_label" value="{{ $last_name }}" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="email_label" class="text-grey-darkest uppercase">Email Address
										<span class="required">Read only</span>
									</label>
									<input name="email" type="email" id="email_label" disabled value="{{ $email }}" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<p class="copy"><span class="required">*</span> Required fields</p>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-center mt-5 mt-sm-4">
								<button type="submit" class="emcq-btn">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<form method="post" action="{{ route('admin.profile.password') }}">
						@csrf
						@method('put')
						<h2 class="subtitle">Change Password</h2>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="current_password_label" class="text-grey-darkest uppercase">Current Password <span class="required">*</span></label>
									<input name="current_password" type="password" class="form-round" id="current_password_label" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="new_password_label" class="text-grey-darkest uppercase">New Password <span class="required">*</span></label>
									<input name="password" type="password" class="form-round" id="new_password_label" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="confirm_new_password_label" class="text-grey-darkest uppercase">Confirm New Password <span class="required">*</span></label>
									<input name="password_confirmation" type="password" class="form-round" id="confirm_new_password_label" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<p class="copy"><span class="required">*</span> Required fields</p>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-center mt-5 mt-sm-4">
								<button type="submit" class="emcq-btn">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
