@extends('retailer.layouts.master')

@section('body')
	@parent
	<h1>{!! $retailer->name !!}</h1>
	<div class="row">
		<div class="col-md-3">
			<div class="well well-sm">
				<ul class="nav nav-pills nav-stacked">
					<li class="{{navActive('retailer.show')}}"><a href="#">Retailer Info</a></li>
					<li><a href="#">Purchases</a></li>
					<li><a href="#">Rentals</a></li>
					<li><a href="#">Movies In Library</a></li>
				</ul>
			</div>
			<hr>
			<p>{!! HTML::linkRoute('retailer.edit', 'Edit ' . $retailer->name, $retailer->id, ['class' => 'btn btn-warning btn-xs btn-block']) !!}</p>
		</div>
		<div class="col-md-9">
			<table class="table table-condensed">
				<thead>
					<th class="text-center">Ownable</th>
					<th class="text-center">Rentable</th>
					<th class="text-center">Digital</th>
					<th class="text-center">Ultraviolet</th>
				</thead>
				<tbody>
					@if($retailer->isOwnable)
						<td class="text-center success"><i class="fa fa-check"></i></td>
					@else
						<td class="text-center danger"><i class="fa fa-minus"></i></td>
					@endif

					@if($retailer->isRentable)
						<td class="text-center success"><i class="fa fa-check"></i></td>
					@else
						<td class="text-center danger"><i class="fa fa-minus"></i></td>
					@endif

					@if($retailer->isDigital)
						<td class="text-center success"><i class="fa fa-check"></i></td>
					@else
						<td class="text-center danger"><i class="fa fa-minus"></i></td>
					@endif

					@if($retailer->isUltraviolet)
						<td class="text-center success"><i class="fa fa-check"></i></td>
					@else
						<td class="text-center danger"><i class="fa fa-minus"></i></td>
					@endif
				</tbody>
			</table>			
		</div>
	</div>
@stop