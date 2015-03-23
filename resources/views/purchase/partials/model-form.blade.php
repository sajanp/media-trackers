{!!Form::model($purchase, ['route' => $formDestination, 'method' => $formMethod])!!}
	
<div class="row">
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
	<div class="col-md-9">
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