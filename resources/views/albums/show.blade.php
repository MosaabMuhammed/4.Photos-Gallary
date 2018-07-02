@extends('layouts.master')

@section('content')
	<h3>{{ $album->name }}</h3>
	<a href="/" class="button secondary">Go Back</a>
	<a href="/photos/create/{{ $album->id }}" class="button primary">Upload Photo to the current Album</a>
	<hr>
	@if ($colcount = count($album->photos) && $i = 1)
		<div id="albums">
			<div class="row text-center">
				@foreach ($album->photos as $photo)
					@if ($i == $colcount)
						<div class="medium-4 columns end">
							<a href="/photos/{{ $photo->id }}">
								<img src="/storage/photos/{{ $photo->photo }}" alt="" class="thumbnail">
							</a>
							<br>
							<h4>{{ $photo->title }}</h4>
					@else
						<div class="medium-4 columns">
							<a href="/photos/{{ $photo->id }}">
								<img src="/storage/photos/{{ $photo->photo }}" alt="" class="thumbnail">
							</a>
							<br>
							<h4>{{ $photo->title }}</h4>
					@endif
					@if ($i % 3 == 0)
						</div> </div> <div class="row text-center">
					@else
						</div>
					@endif
					@php
						$i++;
					@endphp
				@endforeach
			</div>
		</div>
	@else
		<p>No Photos To Display</p>
	@endif
@endsection
