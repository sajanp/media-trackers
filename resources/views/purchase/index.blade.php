@extends('purchase.layouts.master')

@section('body')
	<h1>Purchases</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Date</th>
				<th>Retailer</th>
				<th>Amount</th>
				<th>Items</th>
			</tr>
		</thead>
		<tbody>
			@foreach($purchases as $purchase)
				<tr>
					<td>{!!HTML::linkRoute('purchase.show', $purchase->purchased_on->format('l, F jS, Y'), $purchase->id)!!}</td>
					<td>{{$purchase->retailer->name}}</td>
					<td>${{$purchase->amount}}</td>
					<td>
						<ul>
							@foreach($purchase->movies->all() as $movie)
								<li>{{$movie->title}} @if (strlen($movie->pivot->edition) > 1) - {{$movie->pivot->edition}} @endif ({{$movie->pivot->format->name}})</li>	
							@endforeach
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop