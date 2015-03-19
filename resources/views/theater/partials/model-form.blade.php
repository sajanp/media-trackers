{!!Form::model($theater, ['route' => $formDestination, 'method' => $formMethod])!!}
	<div class="form-group">
		{!! Form::label('name', 'Name')!!}
		{!! Form::text('name', null, ['class' => 'form-control'])!!}
	</div>
	<div class="form-group">
		{!! Form::label('location', 'Location')!!}
		{!! Form::text('location', null, ['class' => 'form-control'])!!}
	</div>
	<hr>
	<div class="form-group">
		{!!Form::submit($formSubmit, ['class' => 'btn btn-success'])!!}
	</div>
{!!Form::close()!!}