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
								<span class="label label-info">{{$format->name}}</span>
							@endif
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop