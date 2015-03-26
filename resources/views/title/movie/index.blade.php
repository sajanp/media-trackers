@extends('title.layouts.movie')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Title</th>
			<th>Owned</th>
		</thead>
		<tbody>
			@foreach($movies->all() as $movie)
				<tr>
					<td>{!! HTML::linkRoute('movie.show', $movie->title, $movie->id) !!}</td>
					<td>
						@foreach($formats as $format)
							@if($movie->purchases()->where('format_id', $format->id)->exists())
								<span class="label label-{{$format->name}}">{{$format->name}}</span>
							@endif
						@endforeach
						@if($movie->ultraviolet->count())
							<span class="label label-Ultraviolet">Ultraviolet</span>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop