@extends('retailer.layouts.master')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Name</th>
			<th>Can Buy From</th>
			<th>Can Rent From</th>
			<th>Is Digital</th>
			<th>Is Ultraviolet</th>
		</thead>
		<tbody>
			@foreach($retailers->all() as $retailer)
				<tr>
					<td>{{$retailer->name}}</td>
					<td class="{{($retailer->isOwnable ? 'success' : 'danger')}}"></td>
					<td class="{{($retailer->isRentable ? 'success' : 'danger')}}"></td>
					<td class="{{($retailer->isDigital ? 'success' : 'danger')}}"></td>
					<td class="{{($retailer->isUltraviolet ? 'success' : 'danger')}}"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop