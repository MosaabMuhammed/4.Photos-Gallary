@extends('layouts.master')

@section('content')
	<h3>Albums</h3>

	@if ($colcount = count($albums) && $i = 1)
		<div id="albums">
			<div class="row text-center">
				@foreach ($albums as $album)
					@if ($i == $colcount)
						<div class="medium-4 columns end">
							<a href="/albums/{{ $album->id }}">
								<img src="storage/album_cover/{{ $album->cover_image}}" alt="" class="thumbnail">
							</a>
							<br>
							<h4>{{ $album->name }}</h4>
					@else
						<div class="medium-4 columns">
							<a href="/albums/{{ $album->id }}">
								<img src="storage/album_cover/{{ $album->cover_image}}" alt="" class="thumbnail">
							</a>
							<br>
							<h4>{{ $album->name }}</h4>
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
		<p>No Albums To Display</p>
	@endif
@endsection
