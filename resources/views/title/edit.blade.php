@extends('title.layouts.master')

@section('body')
	@parent
	@include('title.partials.model-form')

	{!!Form::open(['method' => 'delete', 'route' => ['title.destroy', $title->id]])!!}
		<div class="form-group">
			{!!Form::submit('Delete Movie', ['class' => 'btn btn-danger btn-xs'])!!}
		</div>
	{!!Form::close()!!}
@stop