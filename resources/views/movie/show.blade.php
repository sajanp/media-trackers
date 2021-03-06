@extends('movie.layouts.master')

@section('body')
	@parent
	<h1>{!! $movie->title !!}</h1>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h3>Details</h3>
			<ul class="nav nav-pills nav-stacked">
				<li class="{{navActive('movie.show')}}"><a href="#">Movie Info</a></li>
				<li><a href="#">Viewings</a></li>
			</ul>
			<hr>
			<p>{!! HTML::linkRoute('movie.purchase.create', 'Add Purchase', $movie->id, ['class' => 'btn btn-success btn-block']) !!}</p>
			<p>{!! HTML::linkRoute('movie.edit', 'Edit ' . $movie->name, $movie->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">
			@if($purchase)
				@include('movie.partials.add-to-open-purchase')
			@endif
			<div class="row">
				<div class="col-md-4">
					<h3>Money Spent</h3>
					<table class="table table-condensed">
						<tbody>
							<tr>
								<td>Purchases</td>
								<td>${{number_format($movie->purchases->unique()->sum('amount'), 2)}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-4">
					<h3>Activity</h3>
					<table class="table table-condensed">
						<tr>
							<td>Purchased</td>
							<td>{{$movie->purchases->unique()->count()}} times</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3>Editions Owned</h3>
					<table class="table table-condensed">
						<tr>
							<th>Edition</th>
							<th>Format</th>
						</tr>
						@foreach($editions as $edition)
							<tr>
								<td>{{$edition->edition}}</td>
								<td>{{$edition->format->name}}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
@stop
