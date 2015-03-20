@extends('title.layouts.movie')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Title</th>
		</thead>
		<tbody>
			@foreach($movies->all() as $movie)
				<tr>
					<td>{!! HTML::linkRoute('movie.show', $movie->title, $movie->id) !!}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop