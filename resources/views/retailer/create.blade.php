@extends('retailer.layouts.master')

@section('body')
	@parent
	{!!Form::open(['route' => 'retailer.store'])!!}
		<div class="form-group">
			{!! Form::label('name', 'Name')!!}
			{!! Form::text('name', null, ['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-3">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="isOwnable" value="1">
						Can <strong>buy</strong> from this retailer.
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="isRentable" value="1">
						Can <strong>rent</strong> from this retailer.
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="isDigital" value="1">
						This retailer is <strong>digital</strong>.
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="isUltraviolet" value="1">
						This digital retailer can stream <strong>Ultraviolet</strong>.
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			{!!Form::submit('Add New Retailer', ['class' => 'btn btn-success pull-right'])!!}
		</div>
	{!!Form::close()!!}
@stop