<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	  @include('client.layouts.partials.meta')
	</head>
	<body>
		{{-- @routes --}}
		<div id="vue__app__client" class="position-relative">
			@yield('master')
		</div>

		@include('client.layouts.partials.scripts')
	</body>
</html>
