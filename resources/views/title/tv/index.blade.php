@extends('title.layouts.tv')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Title</th>
		</thead>
		<tbody>
			@foreach($tvTitles->all() as $tv)
				<tr>
					<td>{!! HTML::linkRoute('tv.show', $tv->title, $tv->id) !!}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop