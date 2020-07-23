<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	  @include('admin.layouts.partials.meta')
	</head>
	<body>
		{{-- @routes --}}
		<div id="vue__app__admin" class="position-relative">
			@yield('master')
		</div>

		@include('admin.layouts.partials.scripts')
	</body>
</html>
