@extends('theater.layouts.master')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Name</th>
			<th>Location</th>
		</thead>
		<tbody>
			@foreach($theaters->all() as $theater)
				<tr>
					<td>{!! HTML::linkRoute('theater.show', $theater->name, $theater->id) !!}</td>
					<td>{{$theater->location}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop