@extends('title.layouts.tv')

@section('body')
	@parent
	<h1>{!! $tv->title !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('tv.show')}}"><a href="#">TV Info</a></li>
				<li><a href="#">Viewings</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('title.edit', 'Edit ' . $tv->name, $tv->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">	
		</div>
	</div>
@stop