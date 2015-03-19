@extends('theater.layouts.master')

@section('body')
	@parent
	<h1>{!! $theater->name !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('theater.show')}}"><a href="#">Theater Info</a></li>
				<li><a href="#">Viewings</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('theater.edit', 'Edit ' . $theater->name, $theater->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">	
		</div>
	</div>
@stop