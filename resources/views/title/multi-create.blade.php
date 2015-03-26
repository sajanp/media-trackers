@extends('title.layouts.master')

@section('body')
	@parent
	{!!Form::open(['route' => 'title.multi-store'])!!}
		@for($i = 1; $i < 11; $i++)
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('titles[' . $i . '][title]', 'Title')!!}
						{!! Form::text('titles[' . $i . '][title]', null, ['class' => 'form-control'])!!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('titles[' . $i . '][isTV]', 1) !!}
								Is <strong>television</strong>.
							</label>
						</div>
					</div>
				</div>
			</div>
		@endfor
		<hr>
		<div class="form-group">
			{!!Form::submit('Add All Titles', ['class' => 'btn btn-success'])!!}
		</div>
	{!!Form::close()!!}
@stop