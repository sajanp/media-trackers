@extends('retailer.layouts.master')

@section('body')
	@parent
	<h1>{!! $retailer->name !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('retailer.show')}}"><a href="#">Retailer Info</a></li>
				<li><a href="#">Purchases</a></li>
				<li><a href="#">Rentals</a></li>
				<li><a href="#">Movies In Library</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('retailer.edit', 'Edit ' . $retailer->name, $retailer->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">
			
		</div>
	</div>
@stop