@extends('movie.layouts.master')

@section('body')
	@parent
	{!!Form::open(['route' => 'movie.multi-store'])!!}
		@for($i = 1; $i < 11; $i++)
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('movies[' . $i . '][title]', 'Title')!!}
						{!! Form::text('movies[' . $i . '][title]', null, ['class' => 'form-control'])!!}
					</div>
				</div>
			</div>
		@endfor
		<hr>
		<div class="form-group">
			{!!Form::submit('Add All Movies', ['class' => 'btn btn-success'])!!}
		</div>
	{!!Form::close()!!}
@stop
