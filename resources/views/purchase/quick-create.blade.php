@extends('purchase.layouts.master')

@section('body')
	@parent
	{!!Form::model($purchase, ['route' => $formDestination, 'method' => $formMethod])!!}
	{!!Form::hidden('purchaseable_type', 'title')!!}
		
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				{!!Form::label('title', 'Movie Title')!!}
				{!!Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Movie Title'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('format_id', 'Format')!!}
				{!!Form::select('format_id', $formats, null, ['class' => 'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('edition', 'Edition')!!}
				{!!Form::text('edition', null, ['class' => 'form-control', 'placeholder' => 'Edition'])!!}
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label for="isUltraviolet">
						{!!Form::checkbox('isUltraviolet', 1, null)!!}
						Ultraviolet
					</label>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('retailer_id', 'Retailer')!!}
				{!! Form::select('retailer_id', $retailers, null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('amount', 'Amount')!!}
				{!! Form::text('amount', null, ['class' => 'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('purchased_on', 'Purchased On') !!}
				{!!Form::text('purchased_on', null, ['class' => 'form-control'])!!}
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => 9])!!}
			</div>
		</div>
	</div>

	<hr>

	<div class="form-group">
		{!!Form::submit($formSubmit, ['class' => 'btn btn-success'])!!}
	</div>

	{!!Form::close()!!}

	<script>
		$(function() {
			$("#purchased_on").datepicker({ dateFormat: "yy-mm-dd" });
		});
	</script>
@stop