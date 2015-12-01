{!!Form::model($movie, ['route' => $formDestination, 'method' => $formMethod])!!}
	<div class="form-group">
		{!! Form::label('title', 'Title')!!}
		{!! Form::text('title', null, ['class' => 'form-control'])!!}
	</div>
	<hr>
	<div class="form-group">
		{!!Form::submit($formSubmit, ['class' => 'btn btn-success'])!!}
	</div>
{!!Form::close()!!}
