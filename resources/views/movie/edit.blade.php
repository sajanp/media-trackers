@extends('movie.layouts.master')

@section('body')
	@parent
	@include('movie.partials.model-form')

	{!!Form::open(['method' => 'delete', 'route' => ['movie.destroy', $movie->id]])!!}
		<div class="form-group">
			{!!Form::submit('Delete Movie', ['class' => 'btn btn-danger btn-xs'])!!}
		</div>
	{!!Form::close()!!}
@stop
