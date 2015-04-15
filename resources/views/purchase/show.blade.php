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
						<th>Ultraviolet</th>
						@if(!$purchase->closed)
							<th>Edit</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($purchase->movies->all() as $movie)
						<tr>
							<td>{!!HTML::linkRoute('movie.show', $movie->title, $movie->id)!!}</td>
							<td>{{$movie->pivot->format->name}}</td>
							<td>{{$movie->pivot->edition}}</td>
							<td>
								@if($movie->ultraviolet()->where('purchase_id', $purchase->id)->whereHas('purchaseable', function($q) use ($movie){$q->where('edition', $movie->pivot->edition);})->count())
									Yes
								@endif
							</td>
							@if(!$purchase->closed)
								<td>{!!HTML::linkRoute('purchase.purchaseable.edit', 'Edit', [$purchase->id, $movie->pivot->id])!!}</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@if(!$purchase->closed)
		{!!Form::open(['method' => 'put', 'route' => ['purchase.close', $purchase->id]])!!}
			<div class="form-group">
				{!!Form::submit('Close Purchase', ['class' => 'btn btn-warning'])!!}
			</div>
		{!!Form::close()!!}
	@else
		{!!Form::open(['method' => 'put', 'route' => ['purchase.open', $purchase->id]])!!}
			<div class="form-group">
				{!!Form::submit('Open Purchase', ['class' => 'btn btn-warning'])!!}
			</div>
		{!!Form::close()!!}
	@endif
@stop