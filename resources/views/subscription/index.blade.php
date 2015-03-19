@extends('subscription.layouts.master')

@section('body')
	@parent

	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<th>Name</th>
		</thead>
		<tbody>
			@foreach($subscriptions->all() as $subscription)
				<tr>
					<td>{!! HTML::linkRoute('subscription.show', $subscription->name, $subscription->id) !!}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop