@if ($errors->any())
	<div class="alert main-alert danger d-flex flex-row justify-content-center" role="alert">
		<p class="alert-description red font-weight-normal">
			{{ $errors->first() }}
		</p>
		<i class="fal fa-times action-icon-close my-auto"></i>
	</div>
@elseif (session('error'))
	<div class="alert main-alert danger d-flex flex-row justify-content-center" role="alert">
		<p class="alert-description red font-weight-normal">
			{{ session('error')}}
		</p>
		<i class="fal fa-times action-icon-close my-auto"></i>
	</div>
@elseif (session('success'))
	<div class="alert main-alert success d-flex flex-row justify-content-center" role="alert">
		<p class="alert-description font-weight-normal">
			{{ session('success') }}
		</p>
		<i class="fal fa-times action-icon-close my-auto"></i>
	</div>
@endif


@push('scripts')
	<script type="text/javascript">
		$().ready(function(){
			$('.action-icon-close').on('click', function(e){
				$(this).parent().removeClass('d-flex');
				$(this).parent().addClass('d-none');
			});
		});
	</script>
@endpush
