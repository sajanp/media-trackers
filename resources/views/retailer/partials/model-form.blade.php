{!!Form::model($retailer, ['route' => $formDestination, 'method' => $formMethod])!!}
	<div class="form-group">
		{!! Form::label('name', 'Name')!!}
		{!! Form::text('name', null, ['class' => 'form-control'])!!}
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="checkbox">
					<label>
					{!! Form::checkbox('isOwnable', 1) !!}
					Can <strong>buy</strong> from this retailer.
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="checkbox">
					<label>
					{!! Form::checkbox('isRentable', 1) !!}
					Can <strong>rent</strong> from this retailer.
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="checkbox">
					<label>
					{!! Form::checkbox('isDigital', 1) !!}
					This retailer is <strong>digital</strong>.
					</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="checkbox">
					<label>
					{!! Form::checkbox('isUltraviolet', 1) !!}
					This digital retailer can stream <strong>Ultraviolet</strong>.
					</label>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group">
		{!!Form::submit($formSubmit, ['class' => 'btn btn-success'])!!}
	</div>
{!!Form::close()!!}