@if (count($errors))
	@foreach ($errors->all() as $error)
		<div class="callout alert">
			{{ $error }}
		</div>
	@endforeach
@endif

@if ($flag = session('error'))
	<div class="callout alert">
		{{ $flag }}
	</div>
@endif

@if ($flag = session('success'))
	<div class="callout success">
		{{ $flag }}
	</div>
@endif
