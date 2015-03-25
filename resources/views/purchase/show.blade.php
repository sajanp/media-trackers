@extends('purchase.layouts.master')

@section('body')
	@parent
	<div class="row">
		<div class="col-md-4">
			<h4>Purchase Details</h4>
			<table class="table">
				<tr>
					<th>Retailer</th>
					<td>{{$purchase->retailer->name}}</td>
				</tr>
				<tr>
					<th>Price</th>
					<td>${{$purchase->amount}}</td>
				</tr>
				<tr>
					<th>Date</th>
					<td>{{$purchase->purchased_on->format('l, F jS, Y')}}</td>
				</tr>
			</table>
		</div>
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>Item</th>
						<th>Format</th>
						<th>Edition</th>
					</tr>
				</thead>
				<tbody>
					@foreach($purchase->movies->all() as $movie)
						<tr>
							<td>{{$movie->title}}</td>
							<td>{{$movie->pivot->format->name}}</td>
							<td>{{$movie->pivot->edition}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop