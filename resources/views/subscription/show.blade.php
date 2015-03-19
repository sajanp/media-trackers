@extends('subscription.layouts.master')

@section('body')
	@parent
	<h1>{!! $subscription->name !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('subscription.show')}}"><a href="#">Subscription Info</a></li>
				<li><a href="#">Viewings</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('subscription.edit', 'Edit ' . $subscription->name, $subscription->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">	
		</div>
	</div>
@stop